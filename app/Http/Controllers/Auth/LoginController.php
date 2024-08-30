<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NumberGeneratorController;
use App\Http\Controllers\PasswordSecurityController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function validator(array $data)
    {
        // custom error message for valid_captcha validation rule
        $messages  = [
            'valid_captcha' => 'Wrong code. Try again please.'
        ];

        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
            'captcha_field' => 'required|valid_captcha'
        ], $messages);
    }


    public function performLogin(Request $request)
    {
        $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
//                'captcha_code' => 'required|captcha'
            ]);


            $user_email = $request->input('email');

            $user = User::where('email', $user_email)->first();
//            if (!is_object($user))
//                return redirect()->route('login')->with('status2', 'Invalid email address, try again');

            $user_password = $request->input('password');
            $verify = Hash::check($user_password, $user->password);
            if ($verify) {
//                $this->login($request);
//                $this->attemptLogin($request);
                return redirect($this->redirectTo)->with('status', 'Login successful');
            } else {
                return redirect()->back()->with('status2', 'Invalid credentials, try again');
            }


    }
    public function assignMemberID($user_id){
        $user = User::find($user_id);
        if(is_object($user)) {
            $number_generator = new NumberGeneratorController();
            $generate = $number_generator->get_rand_alphanumeric(8);
            if (User::where('member_id', $generate)->exists()) {
                return $this->assignMemberID($user);
            }
            $user->member_id = $generate;
            $user->update();
        }
        return true;
    }

    public function authenticated(Request $request, $user)
    {
        if($user->status === \App\User::USER_BLOCKED)
        {
            $this->logout($request);
            return redirect()->route('login')->with('status2', 'Your account have been suspended, contact our support.');
        }

        if(empty($user->member_id))
        {
            $this->assignMemberID($user->id);
        }
        $password_security = new PasswordSecurityController();
        $password_security->passwordSecurityCreate($request);

        return redirect()->to($this->redirectTo)->with('status', 'Login successful, welcome back');
    }
}
