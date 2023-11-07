<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Cuppon;
use Illuminate\Http\Request;

class CupponController extends Controller
{
    public function create()
    {
        return view('admin.cuppon.add', ['title' => 'Thêm Cuppon']);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'price_cuppon'=>'required',
            'description'=>'required'
        ],[
            'title.required'=>'Vui Lòng Nhập Mã Cuppon',
            'description.required'=>'Vui Lòng Nhập Mô Tả Khuyến Mãi',
            'price_cuppon.required'=>'Vui Lòng Nhập Giá Giảm',    
        ]);
        $cuppon = new Cuppon();
        $cuppon->title=$request->title;
        $cuppon->price_cuppon=$request->price_cuppon;
        $cuppon->description=$request->description;
        $cuppon->save();
        return redirect()->back()->with('success','Thêm Cuppon Thành Công');
    }
    public function index()
    {
        $cuppon =Cuppon::orderBy('id','DESC')->get();
        return view('admin.cuppon.list',['title'=>'Danh Sách Cuppon'])->with(compact('cuppon'));
    }
    public function destroy($id)
    {
        $cuppon = Cuppon::find($id);
        $cuppon->delete();
        return redirect()->back()->with('success', 'Xóa Thành Công Cuppon');
    }
    public function show($id)
    {
        $cuppon = Cuppon::find($id);
        return view('admin.cuppon.edit', ['title' => 'Chỉnh Sửa Cuppon'], ['cuppon' => $cuppon]);
    }
    public function update($id , Request $request){
        $cuppon=Cuppon::find($id);
        $this->validate($request,[
            'title'=>'required',
            'price_cuppon'=>'required',
            'description'=>'required'
        ],[
            'title.required'=>'Vui Lòng Nhập Mã Cuppon',
            'description.required'=>'Vui Lòng Nhập Mô Tả Khuyến Mãi',
            'price_cuppon.required'=>'Vui Lòng Nhập Giá Giảm',    
        ]);
        $cuppon->title=$request->title;
        $cuppon->price_cuppon=$request->price_cuppon;
        $cuppon->description=$request->description;
        $cuppon->save();
        return redirect()->back()->with('success','Cập Nhật Cuppon Thành Công');

    }
}
