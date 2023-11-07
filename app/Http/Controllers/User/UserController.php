<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $category = Category::orderBy('id','DESC')->get();
            return view('user.profile',['title'=>'Hồ sơ người dùng'])->with(compact('category'));
        }
       
    }
}
