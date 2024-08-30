<?php

namespace App\Http\Controllers;

use App\User;
use App\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function uploadPage()
    {
        return view('appV1.dashboard.upload');
    }
    public function upload(Request $request)
    {
//        dd($request);
        $user = $request->user();
        $user->ssn = $request->input('ssn');
        $user->address = $request->input('physical_address');
        $user->dob = $request->input('dob');
        $user->fname = $request->input('fname');
        $user->phone = $request->input('phone');

        $document_one_type = $request->input('document_one_type');
        $document_two_type = $request->input('document_two_type');
        $document_three_type = $request->input('document_three_type');
        $upload_doc_one = $this->saveFile($request->file('doc_one_upload'), $document_one_type, $user->id, 'kyc');
        $upload_doc_two = $this->saveFile($request->file('doc_two_upload'), $document_two_type, $user->id, 'kyc');
        $doc_three_upload = $this->saveFile($request->file('doc_three_upload'), $document_two_type, $user->id, 'kyc');
        if($upload_doc_one && $upload_doc_two && $doc_three_upload && $document_three_type)
        {
            $user->verify_stage = User::PENDING_APPROVAL;
            $user->update();

            return redirect()->route('dashboard')->with('status', 'Verification documents submitted, waiting for verification');
        }
        return redirect()->back()->with('status2', 'unknown error occurred, one or more files was not uploaded properly try again');
    }
    
    public function getRandomString() {
       $randomString = RAND(9, 99999);
        return $randomString;
    }

    public function saveFile($file, $doc_type, $user_id,  $type){
        if(!empty($file) && $this->validateFileType($file->getClientOriginalExtension())) {
            $image = $file;
            $filename = $this->getRandomString() . time() . '.' . $image->getClientOriginalExtension();
//            $image_resize = Image::make($image->getRealPath());
//            $image_resize->crop(750, 350);

            $destinationPath = storage_path('/app/public/uploads');

            $image->move($destinationPath, $filename);
//            $image_resize->save(public_path('uploads/' . $filename));
//            $filename->save(public_path('uploads/' . $filename));
            $verification = new Verification();
            $verification->user_id = $user_id;
            $verification->verify_type = $type;
            $verification->file_type = $image->getClientOriginalExtension();
            $verification->document_type = $doc_type;
            $verification->path = strtolower('uploads/' . $filename);
            $verification->disk = 'local';
            $verification->status = Verification::UPLOADED_FILE_PENDING;
            $verification->save();

            return $verification->save();
        }else{
            return false;
        }
    }

    public function validateFileType($type){
        if(strtolower($type) ==='png' || strtolower($type) === 'jpg' || strtolower($type) === 'jpeg' || strtolower($type) === 'pdf')
            return true;
        return false;
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,
            [
                'phone' => 'string',
                'address_1' => 'string',
                'fname' => 'string',
                'lname' => 'string',
                'zipcode' => 'string',
            ]
        );
        $referrer_username = $request->input('referrer_username');
        if(!empty($referrer_username)){
            $referrer = User::where('username', $referrer_username)->first();
        }

        $user = User::find($request->user()->id);
        $user->phone = $request->input('phone');
        $user->address = $request->input('address_1');
        $user->dob = $request->input('dob');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('othername');
        $user->zipcode = $request->input('zipcode');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country_id = $request->input('country');
        $user->referrer = !empty($referrer_username) && is_object($referrer) ? $referrer->id : '0';
        $user->update();
        return redirect()->route('upload_page')->with('status', 'Profile updated successfully!');
    }

    public function kycStatusChange($user_id, $action)
    {
        $verification = Verification::where('user_id', $user_id)->get();
        $user = User::find($user_id);

        if($action === "verify")
        {
            foreach ($verification as $docs){
                $verify  = Verification::find($docs->id);
                $verify->status = Verification::VERIFIED_DOC_APPROVED;
                $verify->update();
            }
            if(is_object($user))
            {
                $user->verify_stage = User::VERIFIED;
                $user->update();
            }
            return redirect()->back()->with('status', 'KYC Verification Completed');
        }else{
            foreach ($verification as $docs) {
                $verify_del = Verification::find($docs->id);
                $verify_del->delete();
            }
            $user->verify_stage = User::NOT_VERIFIED;
            $user->update();
        }
        return redirect()->back()->with('status', 'KYC Document Rejected, notify the user with an email explaining why the document was not accepted.');
    }
}
