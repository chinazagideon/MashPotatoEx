<?php

namespace App\Http\Controllers;

use App\Countries;
use App\Transactions;
use App\User;
use App\X4Defaults;
use Illuminate\Http\Request;
use \Auth;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function landing()
    {
        $msg = x4default(X4Defaults::SEND_MSG);
//        $coins = new CoinsController();
//        dd($coins->disableInActiveCoins());
        return view('appV1.dashboard.landing');
    }

    public function swap()
    {
        return view('appV1.dashboard.swap');
    }

    public function lending()
    {
        return view('appV1.dashboard.lending');
    }

    public function staking()
    {
        $coins = new CoinsController();
        $coin_staking = $coins->getSupportedCoins();
        return view('appV1.dashboard.staking', ['coins' => $coin_staking]);
    }

    public function account()
    {
        $countries = Countries::get();
        $user = User::where('id',\Auth::user()->id)->with('country')->first();

        return view('appV1.dashboard.account', ['countries' => $countries, 'country_name' => is_object($user->country) ? $user->country->country_name : '']);
    }

    public function borrow()
    {
        return view('appV1.dashboard.borrow');
    }
    public function addressList()
    {
        return view('appV1.dashboard.addresslist');
    }

    public function referral()
    {
        $my_referrals = User::where('referrer', Auth::user()->id)->get();
        return view('appV1.dashboard.referral', ['my_refs' => $my_referrals]);
    }

    public function verifyRefStatus($user_id)
    {
        if(Transactions::where('type',  'stake')->where('user_id', $user_id)->exists())
        {
            return true;
        }elseif(Transactions::where('type',  'send')->where('user_id', $user_id)->exists()){
            return true;
        }elseif(Transactions::where('type',  'receive')->where('user_id', $user_id)->exists())
        {
            return true;
        }else{
            return false;
        }
    }
     public function changePasswordPage()
    {
        return view('appV1.dashboard.password');
    }

    public function changePassword(Request $request)
    {

        $password_current = Auth::user()->password;

        $input_current_password = $request->get('current_password');
        $password_new = $request->input('password');

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);


        if ((Hash::check($input_current_password, $password_current))) {

            $user = \Auth::user();
            $user->password = bcrypt($password_new);
            $user->save();
            return redirect()->route('dashboard')->with('status', 'Password Changed Successfully');

        } else {
            return redirect()->back()->with('status2', 'current password is incorrect!!');
        }
    }

}
