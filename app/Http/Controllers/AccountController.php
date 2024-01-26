<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\Customer;
use App\Models\CustomerResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as Mail;


class AccountController extends Controller
{
    

     
    public function login(){
        return view('account.login');
    }

//     public function favorite(){
//        $favorites = auth('cus')->user()->favorites ? auth('cus')->user()->favorites : [];
//         return view('account.favorite',compact('favorites'));
//     }

    public function logout(){
        auth('cus')->logout();
        return redirect()->route('account.login')->with('ok','Your logouted');
    }
   
   
    public function check_login(Request $req){
        $req->validate([
            'email' => 'required|exists:customers',
            'password' => 'required',

        ]);
        $data= $req->only('email', 'password');
        

        $check= auth('cus')->attempt($data);
       
        if($check){
          if(auth('cus')->user()->email_verified_at == ''){
               auth('cus')->logout();
               return redirect()->back()->with('no','Your Account is not verify,place check email');
          }
          return redirect()->route('home.index')->with('ok','welcome back');
        }
        return redirect()->back()->with('no','Your Account or password is incorrect');
    }
    
    public function register(){
        return view('account.register');
    }

    public function check_register(Request $req){
       
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'

        ],[
            'name.required' => 'họ tên không để trống',
            'name.min' =>'họ tên tối thiểu 6 ký tự',
            'name.max' =>'họ tên tối đa 100 ký tự'
        ]);
      
        $data= $req->only('name', 'email','phone','address','gender');
       
        $data['password'] = bcrypt($req->password);
        if($acc = Customer::create($data)){
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok','Register Successfully,please check your email to verify account');
        }
        return redirect()->back()->with('no');
       
    }

    public function verify($email){
        $acc = Customer::where('email',$email)->whereNull('email_verified_at')->firstorFail();

        Customer::where('email',$email)->update(['email_verified_at'=>date('Y-m-d')]);
        return redirect()->route('account.login')->with('ok','Verify Account Successfully,you can login');
    }

    public function change_password(){
        return view('account.change_password');
    }
    public function check_change_password(Request $req){
        $auth =auth('cus')->user();
        $req->validate([
            'old_password' =>['required',function($attr,$value,$fail) use($auth) {
             
              if(!Hash::check($value,$auth->password)){
               $fail('Your password is not match');
              }
            }],
            'password' =>'required|min:4',
            'confirm_password' => 'required|same:password',
        ]);
        $data['password']= bcrypt($req->password);
        $check=$auth->update($data);
        if($check){
            auth('cus')->logout();
            return redirect()->route('account.login')->with('ok','Update your password successfully');
        }
return redirect()->back()->with('no','Something errror, please check again');

    }
    public function forgot_password(){
        return view('account.forgot_password');
    }
    public function check_forgot_password(Request $req){
        $req->validate([
            'email' => 'required|exists:customers',
        ]);
        $customer= Customer::where('email', $req->email)->first();
        $token=\Str::random(50);
        $tokenData=[
            'email' => $req->email,
            'token' => $token
        ];
        CustomerResetToken::where('email', $req->email)->delete();
        if(CustomerResetToken::create($tokenData)){
            Mail::to( $req->email)->send(new ForgotPassword($customer, $token));
            return redirect()->back()->with('ok','send mail successfully');
        }
        return redirect()->back()->with('no','Something errror, please check again');

    }
    public function profile(){
        $auth= auth('cus')->user();

        return view('account.profile',compact('auth'));
    }
    public function check_profile(Request $req){
        $auth =auth('cus')->user();
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers,email,'.$auth->id,
            'password' => ['required',function($attr,$value,$fail) use ($auth) {   
                if (!Hash::check($value,$auth ->password)){
                    return $fail('your password is not mutch');
                }
              
            }],

        ],[
            'name.required' => 'họ tên không để trống',
            'name.min' =>'họ tên tối thiểu 6 ký tự',
        ]);
        $data= $req->only('name', 'email','phone','address','gender');
        $check= $auth->update($data);
        if($check){
                    return redirect()->back()->with('ok','Update your profile successfully');
                }
        return redirect()->back()->with('no','Something errror, please check again');
    
    }
    public function reset_password($token){
    
        $tokenData=CustomerResetToken::checkToken($token);
        return view('account.reset_password');
    }
    public function check_reset_password($token){
       
        request()->validate([
            'password' =>'required|min:4',
            'confirm_password' =>'required|same:password'
       ]);
       $tokenData=CustomerResetToken::checkToken($token);
       $customer=$tokenData->customer;
       $data=[
           'password'=> bcrypt(request('password'))
       ];
       $check=$customer->update($data);
      
       if($check){
        return redirect()->back()->with('ok','Update your password successfully');
    }
return redirect()->back()->with('no','Something errror, please check again');
    }
    
}
