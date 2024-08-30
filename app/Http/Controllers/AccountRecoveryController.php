<?php

namespace App\Http\Controllers;

use App\PasswordSecurity;
use App\WalletRecovery;
use App\User;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Facades\Hash;

class AccountRecoveryController extends Controller
{
    public function recover()
    {
        return view('auth.recovery');
    }

    public function recoverAccountByPhrase()
    {
        return view('auth.phrase_recover');
    }

    public function recoverWallet(Request $request)
    {
//        grayness, adolescence, empeach , healthfulness, anconeus, dichromate, bountihead  fugacy, attempter, haranguing, debilitation, drolling
        $this->validate($request, ['phrase' => 'required']);
        $phrase = $request->input('phrase');

        $explode = explode(',', $phrase);
        if(count($explode) >= 11 && is_array($explode)) {
            $words = '';

            foreach ($explode as $count => $key) {
                $phrase_recover = WalletRecovery::where('word', trim($key))->where('serial_no', $count + 1)->value('user_id');
                $words .= $phrase_recover . ',';
            }
            $user_ids = array_filter(explode(',', $words));
            $count_trues = '';
            $count_falses = '';
            for ($count = 0; $count < count($user_ids); $count++) {
                if ($user_ids[$count] === $user_ids[0]) {
                    $count_trues .= true . ',';
                } else {
                    $count_falses .= false . ',';
                }
            }
            if (count(array_filter(explode(',', $count_trues))) === 12) {

                $dets = $user_ids[0];
                Cookie::queue(cookie('recover_data', $dets, 45000));
                return redirect()->route('recover_password')->with('status', 'Create a new password to continue');
            }
        }
        return redirect()->back()->with('status2', 'Invalid recovery phrase');


    }

    public function recoverCreatePassword()
    {
        $user_id = Cookie::get('recover_data');
        $user = User::find($user_id);
        if (is_object($user)) {
            $user->recover_password = md5($user->id . time());
            $user->update();
        }
        $email = '';

        return view('auth.recovery_password',
            ['email' => $email, 'token' => $user->recover_password]
        );
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:8|confirmed'
        ]);

        $password = $request->input('password');
        $email = $request->input('email');
        $token = $request->input('token');
        $user = User::where('recover_password', $token)->first();
//        dd($request);
        if (is_object($user)) {
            //disable 2FA
            $password_security = PasswordSecurity::where('user_id', $user->id)->first();
            $password_security->google2fa_enable = 0;
            $password_security->google2fa_secret = null;
            $password_security->update();

            $user->email = $email;
            $user->password = Hash::make($password);
            $user->email_verified_at = null;

            $user->update();
            return redirect()->route('login')->with('status', 'Account Recovery Completed, Login to continue');
        }
        return redirect()->to('/')->with('status2', 'Unable to complete action');
    }

}
