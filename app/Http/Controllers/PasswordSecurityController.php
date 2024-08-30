<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\PasswordSecurity;
use PragmaRX\Google2FAQRCode\Google2FA;

class PasswordSecurityController extends Controller
{
    public function show2faForm()
    {
        $user = Auth::user();

        $google2fa_url = "";
        if(!empty($user->passwordSecurity->google2fa_secret) && $user->passwordSecurity()->exists()){
            $google2fa = new Google2FA();
            $google2fa_url = $google2fa->getQRCodeInline(
                config('app.name'),
                $user->email,
                $user->passwordSecurity->google2fa_secret
            );
        }
        $data = array(
            'user' => $user,
            'google2fa_url' => $google2fa_url
        );
        return view('auth.2fa')->with('data', $data);

    }

    public function generate2faSecret(Request $request)
    {
        $user = Auth::user();
        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // Add the secret key to the registration data
        $exists = PasswordSecurity::where("user_id", $user->id)->count();
        if($exists < 1) {
            PasswordSecurity::create([
                'user_id' => $user->id,
                'google2fa_enable' => 0,
                'google2fa_secret' => $google2fa->generateSecretKey(),
            ]);
        }else{
            PasswordSecurity::where("user_id", $user->id)->update([
                'user_id' => $user->id,
                'google2fa_enable' => 0,
                'google2fa_secret' => $google2fa->generateSecretKey(),
            ]);
        }

        return redirect()->route('2fa')->with('success',"Secret Key is generated, Please verify Code to Enable 2FA");

    }

    public function passwordSecurityCreate(Request $request){
        $user = $request->user();
        // Add the secret key to the registration data
        $exists = PasswordSecurity::where("user_id", $user->id)->exists();
        if (!$exists && is_object($user)) {
            PasswordSecurity::create([
                'user_id' => $user->id,
                'google2fa_enable' => 0,
                'google2fa_secret' => NULL,
            ]);
        } else {
            if (!$user->passwordSecurity->google2fa_enable) {
                PasswordSecurity::where("user_id", $user->id)->update([
                    'user_id' => $user->id,
                    'google2fa_enable' => 0,
                    'google2fa_secret' => NULL,
                ]);
            }
        }
        return true;

    }
    public function enable2fa(Request $request){
        $user = Auth::user();
        $google2fa = app('pragmarx.google2fa');
        $secret = $request->input('verify-code');
        $valid = $google2fa->verifyKey($user->passwordSecurity->google2fa_secret, $secret);
        if($valid){
            $user->passwordSecurity->google2fa_enable = 1;
            $user->passwordSecurity->save();
//            return json_encode(["status" => "true", "error"=> 'success']);
            return redirect()->route('account.2fa')->with('success',"2FA is Enabled Successfully.");
        }else{
            return redirect()->route('account.2fa')->with('error',"Invalid Verification Code, Please try again.");

//            return json_encode(["status" => "false", 'error' =>"Invalid Verification Code, Please try again."]);
        }
    }
    public function disable2fa(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your  password does not matches with your account password. Please try again.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        $user = Auth::user();
        $user->passwordSecurity->google2fa_enable = 0;
        $user->passwordSecurity->google2fa_secret = null;
        $user->passwordSecurity->save();
        return redirect()->route('account.2fa')->with('success',"2FA is now Disabled.");
    }
}
