<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AjaxLoginController extends Controller
{
    public function login(Request $req){
        $req->validate([
            'email' => 'required|exists:customers',
            'password' => 'required'
        ], [
            'email.exists' => 'Email không tồn tại trong hệ thống',
            'email.required' => 'Email ',
            'password.required' => 'Nhập mật khẩu',
        ]);
        $data = $req->only('email', 'password');
        $check = auth('cus')->attempt($data);
        if ($check) {
            if (auth('cus')->user()->email_verified_at == null) {
                auth('cus')->logout();
                return response()->json(['error'=>['You account is not verify, please check email again']]);
                return redirect()->back()->with('no', 'You account is not verify, please check email again');
            }
            return response()->json(['data'=>auth('cus')->user()]);
            return redirect()->route('home.index')->with('ok', 'Welcome back');
        }
        return response()->json(['error'=>['You account or password invalid']]);
    }

    public function comment($post_id,Request $req){
    
        $customer_id= auth('cus')->user()->id;
        $req->validate([
           
            'content' => 'required',
        ], [
            'content.required' => 'Nội dung không để trống ',
        ]);
        $data = [
            'customer_id' => auth('cus')->id(),
            'blog_id' => $req->post_id,
            'content' => $req->content,
        ];
         if($comment = Comment::create($data)){ 
             $comments = Comment::where(['post_id'=>$post_id,'replay_id'=> 0]);
            return view('home.blog.lisst-comment',compact('comments'));
          
         }
     
        return response()->json(['error'=>[0]]);
    }
}
