<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.product.add',['title'=>'Thêm Sách'])->with(compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'producer'=>'required',
            'author'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'price_sale'=>'required',
            'image'=>'required'
        ],[
            'name.required'=>'Vui Lòng Nhập Tên Sách',
            'producer.required'=>'Vui Lòng Nhập Nhà Xuất Bản',
            'author.required'=>'Vui Lòng Nhập Tên Tác Giả',
            'quantity.required'=>'Vui Lòng Nhập Số Lượng',
            'price.required'=>'Vui Lòng Nhập Giá Bán',
            'price_sale.required'=>'Vui Lòng Nhập Giá Khuyến Mãi',
            'image.required'=>'Vui Lòng Chọn Ảnh'
        ]);
        $sanpham = new Product();
        $sanpham->name=$request->name;
        $sanpham->producer=$request->producer;
        $sanpham->author=$request->author;
        $sanpham->quantity=$request->quantity;
        $sanpham->price=$request->price;
        $sanpham->price_sale=$request->price_sale;
        $sanpham->description=$request->description;
        $sanpham->category_id=$request->category_id;
        $sanpham->image = $this->upLoadFile($request);
        $sanpham->save();
        return redirect()->back()->with('success', 'Thêm Thành Công Danh Mục');
    }
    public static function upLoadFile(Request $request)
    {
        $nameImage = Str::random(6);
        if ($request->has("image") != null) {
            $fileName = "{$nameImage}.jpg";
            $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = "$fileName";
            return $data['image'];
        }
    }
    public function index()
    {
        $product =Product::with('category')->get();
        return view('admin.product.list', ['title' => 'Liệt Kê Sách '])->with(compact('product'));
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $path = public_path() . '/images/';
        if ($product->image != null) {
            unlink($path . $product->image);
        }
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa Thành Công Danh Mục');
    }
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.product.edit', [
            'title' => 'Sửa Sách'
        ], ['product' => $product])->with(compact('category'));
    }
    public function update($id,Request $request )
    {
        $sanpham = Product::find($id);
        $this->validate($request,[
            'name'=>'required',
            'producer'=>'required',
            'author'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'price_sale'=>'required',
            'image'=>'required'
        ],[
            'name.required'=>'Vui Lòng Nhập Tên Sách',
            'producer.required'=>'Vui Lòng Nhập Nhà Xuất Bản',
            'author.required'=>'Vui Lòng Nhập Tên Tác Giả',
            'quantity.required'=>'Vui Lòng Nhập Số Lượng',
            'price.required'=>'Vui Lòng Nhập Giá Bán',
            'price_sale.required'=>'Vui Lòng Nhập Giá Khuyến Mãi',
            'image.required'=>'Vui Lòng Chọn Ảnh'
        ]);
        $sanpham->name=$request->name;
        $sanpham->producer=$request->producer;
        $sanpham->author=$request->author;
        $sanpham->quantity=$request->quantity;
        $sanpham->price=$request->price;
        $sanpham->price_sale=$request->price_sale;
        $sanpham->description=$request->description;
        $sanpham->category_id=$request->category_id;
        $sanpham->image = $this->upLoadFile($request);
        $sanpham->save();
        return redirect('admin/product/list')->with('success', 'Cập Nhật Thành Công');
    }
}
