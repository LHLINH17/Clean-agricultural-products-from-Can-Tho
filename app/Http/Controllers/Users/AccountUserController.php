<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\Customer;
use App\Models\CustomerResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AccountUserController extends Controller
{
    public function login()
    {
        return view('userAccount.login', [
            'title' => 'Login account',
        ]);
    }
    public function register()
    {
        return view('userAccount.register',[
            'title' => 'Register account'
        ]);
    }
    public function check_registerAccount(Request $request)
    {
        #validate dữ liệu đăng ký tài khoản
        $request->validate([
            'name' => 'required|min:6|max:30',
            'email' => 'required|min:6|email|unique:customers',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|same:password|min:6|max:20',
            'address' => 'required',
            'phone' => 'required',

        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'name.min' => 'Please enter your full name (minimum 6 characters)',
            'email.unique' => 'Email already exists',
            'password.required' => 'Please enter your password',
            'confirm_password.required' => 'Please enter your confirm password',
            'address.required' => 'Please enter your address',
            'phone.required' => 'Please enter your phone',
        ]);
        $data = $request->only('name', 'email', 'password', 'address', 'phone');
        $data['password'] = bcrypt($request->password);
        if($acc = Customer::create($data))
        {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('login')->with('success', 'Account registration successful, please check your email to verify your account');
        }
//        dd($data);
        return redirect()->back()->with('error', 'Registration failed');
//        dd('No, Ok');
    }

    public function verify_account($email)
    {
        $acc = Customer::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
//        dd($acc);
//        return view('')
        Customer::where('email', $email)->update(['email_verified_at'=>date('Y-m-d')]);
        return redirect()->route('login')->with('success', 'Account verification successful');
    }

    public function check_loginAccount(Request $request)
    {
        $this->validate($request, [
//            'email' => 'required|exists:customers',
            'email'=>'required|email:filter',
            'password' => 'required',
        ],[
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        $data = $request->only('email', 'password');

        $check = auth('cus')->attempt($data);

        if ($check)
        {
           if (auth('cus')->user()->email_verified_at == null)
           {
               auth('cus')->logout();

               return redirect()->back()->with('error', 'Account not verified. Please check your email to verify your information');
           }
           return redirect('/')->with('success', 'Successful login');
        }
        return redirect()->back()->with('error', 'Incorrect email or password');
    }
    public function logout()
    {
        auth('cus')->logout();
        return redirect()->back()->with('success', 'Successful logout');
    }

    public function profile()
    {
        $auth = auth('cus')->user();
        return view('userAccount.profile',compact('auth'),[
            'title' => 'Profile'
        ]);
    }

    public function check_profile(Request $request)
    {
        $auth = auth('cus')->user();

        #validate dữ liệu đăng ký tài khoản
        $request->validate([
            'name' => 'required|min:2|max:30',
            'email' => 'required|min:6|email|unique:customers,email,'.$auth->id,
            'password' => ['required', function ($atrr, $value, $fail) use($auth) {
                if(!Hash::check($value, $auth->password) )
                return $fail('Your password is not match');
            }],
        ], [
            'name.required' => 'Please enter your full name',
            'name.min' => 'Please enter your full name with at least 6 characters',
        ]);
        $data = $request->only('name', 'email', 'password', 'address', 'phone');

        $check = $auth->update($data);
//        dd($check);
        if($check)
        {
            return redirect()->back()->with('success', 'Update profile successfully');
        }
        return redirect()->back()->with('error', 'Something Error');
    }

    public function change_password()
    {
        return view('userAccount.change_password',
        [
            'title' => 'Change password'
        ]);
    }

    public function check_change_password(Request $req)
    {
        $auth = auth('cus')->user();
        $req->validate([
            'old_password' => ['required', function ($atrr, $value, $fail) use($auth) {
                if(!Hash::check($value, $auth->password)  )
                    return $fail('Your password is not match');
            }],
            'new_password' => 'required|min:4',
            'confirm_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Please enter your old password',
            'new_password.required' => 'Please enter your new password',
            'confirm_password.required' => 'Please re-enter your new password'
        ]);

        $data['password']=bcrypt($req->new_password);
        $check = $auth->update($data);
        if($check)
        {
            auth('cus')->logout();
            return redirect()->route('login')->with('success', 'Update your password successfully');
        }
        return redirect()->back()->with('error', 'Something error, please check again');
    }

    public function forgot_password()
    {
        return view('userAccount.forgot_password',[
            'title' => 'Forgot Password'
        ]);
    }

    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email'=>'required|exists:customers'
        ]);

        $customer = Customer::where('email', $req->email)->first();

        $token = \Str::random(40);
        $tokenData = [
            'email' => $req->email,
            'token' => $token
        ];
//        dd($tokenData);

        if (CustomerResetToken::create($tokenData))
        {
            Mail::to($req->email)->send(new ForgotPassword($customer, $token));
            return redirect()->back()->with('success', 'Please check email to continue');
        }
        return redirect()->back()->with('error', 'Something error, please check again');

    }

    public function reset_password($token)
    {
        $tokenData = CustomerResetToken::where('token', $token)->firstOrFail();
//        $customer = Customer::where('email', $tokenData->email)->firstOrFail();
        $customer = $tokenData->customer;

        return view('userAccount.reset_password',[
            'title' => 'Reset Password'
        ]);
    }

    public function check_reset_password($token)
    {
        \request()->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        $tokenData = CustomerResetToken::where('token', $token)->firstOrFail();
        $customer = $tokenData->customer;

        $data = [
            'password' => bcrypt(\request(('password')))
        ];

//        dd($data);
        $check = $customer->update($data);

//        dd($check);
        if($check)
        {
            return redirect()->route('login')->with('success', 'Update your password successfully');
        }
        return redirect()->back()->with('error', 'Something Error');
    }
}
