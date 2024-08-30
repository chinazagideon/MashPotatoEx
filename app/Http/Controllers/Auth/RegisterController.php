<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\PasswordSecurityController;
use App\Http\Controllers\WalletRecoveryController;
use App\Http\Controllers\WalletsController;
use App\Mail\WelcomeUser;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'without_spaces', 'max:50', 'unique:users,username'],
            'phone' => ['required', 'string', 'max:20']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'referrer' => $this->getReferrerID($data['referrer']),
        ]);
    }

    public function registered(Request $request, $user)
    {

        try {
//            Mail::to($user)->send(new WelcomeUser($user));

            $ref_id = Cookie::get('referrer');
            $referrer_email = !empty($ref_id) ? $ref_id: config('referrer_admin');
            $referral = User::where('member_id', $referrer_email)->first();

            if (is_object($referral)) {
                $user->referrer = $referral->id;
                $user->total_referrals += 1;
                $user->update();
            }

            $password_security = new PasswordSecurityController();
            $password_security->passwordSecurityCreate($request);

            $wallet_recovery = new WalletRecoveryController();
            $wallet_recovery->generatePhrase($user);

            if(is_object($request->user()) && empty($request->user()->member_id))
            {
                $login_controller = new LoginController();
                $login_controller->assignMemberID($request->user()->id);
            }


            //generate User Wallets
            $wallets = new WalletsController();
            $wallets->assignCoinWallet($user->id);
//            $wallets->assignTokenWallet($user->id);
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
        }
        return redirect()->to($this->redirectTo)->withCookie(Cookie::forget('referrer'))->with('status', 'Account created successfully');
    }
    public function showRegistrationForm()
    {
        $referrer = Cookie::get('referrer');
        return view('auth.register', ['referrer' => $referrer]);
    }
    public function getReferrerID($username)
    {
        $user = User::where('member_id', $username)->first();
        if(is_object($user))
        {
            return $user->id;
        }
        return 20;
    }


}
