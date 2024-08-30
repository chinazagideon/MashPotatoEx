<?php

namespace App\Http\Controllers;

use App\Blogs;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function blog()
    {
        $posts = Blogs::where('status', Blogs::PUBLISHED)->orderBy('id', 'desc')->paginate(12);
        return view('appV1.blog.landing', ['posts' => $posts]);
    }
    public function single($id)
    {
        $post = Blogs::where('slug', $id)->where('status', Blogs::PUBLISHED)->first();
        if(is_object($post)) {
            if($post->id >= 2) {
                $prv_post = Blogs::where('id', $post->id - 1)->first();
            }else{
                $prv_post = null;
            }

            if(Blogs::where('id', $post->id + 1)->exists()){
                $nxt = Blogs::where('id', $post->id +1)->first();
            }else{
                $nxt = null;
            }
            //update views
            $this->updateViews($id);

            return view('appV1.blog.single', ['post' => $post, 'next_post' => $nxt, 'prv_post' => $prv_post]);
        }else{
            return redirect()->route('blog')->with('status2', 'Invalid link');
        }
    }

    public function req($coin_slug)
    {
        $client = new Client();
        $content_type = "news";
//        $coins =
        $res = $client->request('POST', "https://apidojo-yahoo-finance-v1.p.rapidapi.com/news/v2/list?rapidapi-key=".env('RAPID_API_KEY')."&snippetCount=28&s=".strtoupper($coin_slug));
//        $res = $client->request('GET', "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-insights?rapidapi-key=601baca5cemsh118fc13a24c7d8ep13e9aejsn88a8ffd480b3&symbol=ETH");

        $body = $res->getBody();
        $StringBody = (string) $body;
        $decode = json_decode($StringBody);
        $data = [];
        if($decode->status == 'OK') {
            $result = $decode->data->main->stream;

            for($count = 0 ; $count < count($result); $count++){
                if(!empty($result[$count]->content->title)) {

                    $news_body = $client->request('GET', "https://apidojo-yahoo-finance-v1.p.rapidapi.com/news/v2/get-details?rapidapi-key=".env('RAPID_API_KEY')."&uuid=".$result[$count]->id);
                    $news_body = $news_body->getBody();
                    $news_string = (string) $news_body;
                    $news_result = json_decode($news_string);
                    if(isset($news_result->data)) {
                        $post_content = $news_result->data->contents;
                        for($post_count = 0; $post_count < 1; $post_count++){
                            $post_summary = $post_content[$post_count]->content->summary;
                            if(is_object($post_content[$post_count]->content->body->data->partnerData->cover)
                                && !empty($post_content[$post_count]->content->body->data->partnerData->cover->image)
                            )
                            {
                                $cover = $post_content[$post_count]->content->body->data->partnerData->cover->image->originalUrl;
                            }else{
                                $cover = null;
                            }
                            $post_url = $post_content[$post_count]->content->body->data->partnerData->url;
                            $markup = $post_content[$post_count]->content->body->markup;

                            $data = [
                                'summary' => $post_summary,
                                'cover' => $cover,
                                'post_url' => $post_url,
                                'description' => $markup,
                                'provider' => $post_content[$post_count]->content->provider->displayName,
                            ];
                        }

                        $data += [
                            'post_id' => $result[$count]->id,
                            'caption' => utf8_encode($result[$count]->content->title),
                            'pubDate' => strip_tags($result[$count]->content->pubDate),
                            'has_video' => $result[$count]->content->hasVideo == true ? "1" : "0",
                            'content_type' => $result[$count]->content->contentType,
                            'slug' => Str::slug($result[$count]->content->title),
                            'category' => $coin_slug,
                            'tags' => $content_type,
//                        'source' =>
                            'status' => Blogs::PUBLISHED,

                        ];

                        if (!empty($result[$count]->content->thumbnail)) {

                            $images = $result[$count]->content->thumbnail->resolutions;
                            for ($image_count = 0; $image_count < count($images); $image_count++) {
                                $data += [
                                    'image_' . ($image_count + 1) . '_url' => $images[$image_count]->url,
                                ];
                            }
                            if (!$this->verifyIfPostExists($result[$count]->id)) {
                                $save = $this->saveNews($data);
                            }
                        }
                    } else{
                        //news detail doesn't exist
                    }

                }

            }
            return true;
        }else{
            die(0);
        }
    }

    public function saveNews($data){
        $blog = Blogs::create($data);
        return $blog;

    }
    public function verifyIfPostExists($id){
        return Blogs::where('post_id', $id)->exists();
    }
    public function updateViews($slug){
        $post = Blogs::where('slug', $slug)->first();
        $post->views += 1;
        $post->update();
        return true;
    }
}
