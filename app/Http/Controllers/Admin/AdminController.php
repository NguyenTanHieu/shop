<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index(){ 
       
        return view('admin.index');
    }
    public function login(){ 
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('123456'),
        // ]);
       
        return view('admin.login');
    }
    public function check_login(Request $req){ 
       $req->validate([
        'email'=>'required|email|exists:users',
        'password'=>'required'
       ]);
       $data = $req->only('email', 'password');
       $check= auth()->attempt($data);
       if($check){
                  return redirect()->route('admin.index')->with('ok','welcome back');
              }else{
                  return redirect()->back()->with('no', 'Your email or password it not match');
              }
    }
    public function logout(){ 
       auth()->logout();
       return redirect()->route('admin.login')->with('no','Logouted');
    }
}
