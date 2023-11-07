<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Cuppon;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product= Product::orderBy('id','DESC')->get();
        $cuppon = Cuppon::orderBy('id','DESC')->get();
        $category= Category::orderBy('id','DESC')->get();
        return view('home.index',['title'=>'Trang Chủ'])->with(compact('category','cuppon','product'));
    }
    public function detailproduct($id)
    {
        $product= Product::orderBy('id','DESC')->get();
        $cuppon = Cuppon::orderBy('id','DESC')->get();
        $category= Category::orderBy('id','DESC')->get();
        $prodetail = Product::find($id);
        return view('user.product.detailproduct',['title'=>'Chi Tiết Sách'])->with(compact('category','cuppon','product','prodetail'));
    }
}
