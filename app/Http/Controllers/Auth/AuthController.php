<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginindex()
    {
        return view('user.auth.login',['title'=>'Đăng Nhập Hệ Thống']);
    }
    public function registerindex()
    {
        return view('user.auth.register',['title'=>'Đăng Ký Hệ Thống']);
    }

    public function postregister(Request $request)
    {
        $this->validate($request,[ 
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
        ],[
            'name.required'=>'Vui lòng nhập tên người dùng',
            'email.required'=>'Vui lòng nhập email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        //dd($request);
        $user->save();
        return redirect()->route('postregister')->with('success','Đăng Ký Thành Công');
    }
    public function login(request $request)
    {
        $this->validate(
            $request,[
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'email.required'=>'Vui Lòng Nhập Email',
                'password.required'=>'Vui Lòng Nhập Mật Khẩu'
            ]
        );
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('index');
        }
        else
        return redirect()->route('login')->with('error','Email hoặc mật khẩu không chính xác');
    } 
    public function logout(){
       Auth::logout();
       return redirect('home/index');
    }
}
