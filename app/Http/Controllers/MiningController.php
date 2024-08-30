<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Countries;
use App\Mining;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;

class MiningController extends Controller
{
    public function miningPage()
    {

        $mining_products = Mining::where('status',  Mining::ACTIVE)->get();
        return view('appV1.pages.mining_products', ['products' => $mining_products]);
    }
    public function miningTools()
    {
        return view('appV1.dashboard.mining_tools');
    }
    public function orderItem()
    {
         if(!isset($_COOKIE['cartItem'])){
            return redirect()->route('mining')->with('status', 'Cart is empty');
        }
        
        $cart_id = $_COOKIE['cartItem'];
        $cart_item = Cart::where('session_id', $cart_id)->get();
        
        if(($cart_item->count() <= 0) && !Cart::where('session_id', $cart_id)->exists())
        {
            return redirect()->route('mining')->with('status', 'Cart is empty');
        }
        $countries = Countries::get();
        return view('appV1.pages.mining_request', ['cart_item' => $cart_item, 'session_id' => $cart_id, 'countries' => $countries]);

    }

    public function updateMiningPage()
    {
        $minings = Mining::get();
        return view('appV1.admin.mining_upload', ['minings' => $minings]);
    }

    public function saveMiningItem(Request $request)
    {
//        dd($request);

        $mining = new Mining();
        $mining->caption = $request->input('caption');
        $mining->price = $request->input('price');
        $mining->tag = 'miner';
        $mining->product_id = md5(time());
        $mining->promotion_code = $request->input('promo_code');
        $mining->description = $request->input('description');
        $mining->status = Mining::ACTIVE;

        $uploads = new UploadsController();
        $upload_image = $uploads->saveFile($request->file('thumbnail'), 'miner', $mining->caption);

        if($upload_image){
            $mining->image_url = $upload_image;
            $mining->save();
            return redirect()->back()->with('status', 'Product uploaded successfully');
        }

        return redirect()->back()->with('status2', 'Unable to upload product');

    }

    public function updateMiningItem(Request $request, $product_id){

        $mining = Mining::where('product_id', $product_id)->first();
        if(is_object($mining)){
            $mining->caption = $request->input('edit_caption');
            $mining->price = $request->input('edit_price');
            $mining->promotion_code = $request->input('edit_promo_code');
            $mining->description = $request->input('edit_description');
            $mining->update();

            return redirect()->back()->with('status', 'Product updated successfully');
        }
        return redirect()->back()->with('status2', 'Unable to edit product');
    }
    public function updateMiningStatus($action, $id)
    {
        $mining = Mining::where('product_id', $id)->first();
        if(is_object($mining)){
            if($action === 'display') {
                $msg = 'Displayed';
                $mining->status = Mining::ACTIVE;
                $mining->update();
            }else{
                $msg = "Hidden";
                $mining->status = Mining::DEACTIVATED;
                $mining->update();
            }

            return redirect()->back()->with('status', 'Product status changed to '.$msg);
        }
        return redirect()->back()->with('status2', 'Unable to continue');
    }
}
