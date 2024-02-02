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

    public function comment(Request $req, $post_id)
    {
        $customer_id = auth('cus')->user()->id;
        $req->validate([
           

            'content' => 'required',
        ], [
            'content.required' => 'Nội dung không để trống ',
        ]);
        $data = [
            'customer_id' => auth('cus')->id(),
            'blog_id' => $req->post_id,
            'content' => $req->content,
            'reply_id' => isset($req->reply_id) ? $req->reply_id : null,
        ];
        if ($req->ajax()) {
            $comment = Comment::create($data);
            $comments = Comment::where(['blog_id' => $post_id, 'reply_id' => null])->get();
            $html = view('home.blog.lisst-comment', compact('comments'))->render();
            return response()->json([
                'status' => 200,
                'comment' => $comment,
                'html' => $html,
            ]);
        }else{
            $comments = Comment::where(['blog_id' => $post_id, 'reply_id' => null])->get();
       
            return view('home.blog.lisst-comment', compact('comments'));
        }
    }
}
