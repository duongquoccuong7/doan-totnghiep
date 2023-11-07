<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $category = Category::where('parent_id', 0)->get();
        return view('admin.category.add', ['title' => 'Thêm Danh Mục'])->with(compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name|min:5|max:50'
        ], [
            'name.required' => 'Vui Lòng Nhập Tên Danh Mục',
            'name.unique' => 'Tên Danh Mục Đã Có',
            'name.min' => 'Tên Danh Mục Có ít Nhất 3 Ký Tự',
            'name.max' => 'Tên Danh Mục Có Nhiều Nhất 50 Ký Tự',
        ]);
        $danhmuc = new Category();
        $danhmuc->name = $request->name;
        $danhmuc->parent_id = $request->parent_id;
        $danhmuc->save();
        return redirect()->back()->with('success', 'Thêm Thành Công Danh Mục');
    }
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.list', ['title' => 'Danh Sách Danh Mục'])->with(compact('category'));
    }
    public function show($id)
    {
        $category = Category::find($id);
        $categorys = Category::all();
        return view('admin.category.edit', ['title' => 'Chỉnh Sửa Danh Mục'], ['category' => $category,'categorys'=>$categorys]);
    }
    public function update(Request $request, $id)
    {
        $danhmuc = Category::find($id);
        $this->validate($request, [
            'name' => 'required|min:5|max:50',
        ], [
            'name.required' => 'Vui Lòng Nhập Tên Danh Mục',
            'name.min' => 'Tên Danh Mục Có ít Nhất 3 Ký Tự',
            'name.max' => 'Tên Danh Mục Có Nhiều Nhất 50 Ký Tự',
        ]);

        $danhmuc->name = $request->name;
        $danhmuc->parent_id = $request->parent_id;
        $danhmuc->save();
        return redirect()->back()->with('success', 'Cập Nhật Thành Công');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Xóa Thành Công Danh Mục');
    }
}
