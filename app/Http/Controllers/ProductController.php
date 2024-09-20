<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('name', 'ASC')->get();
        $products = Product::filter()->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.product.index', compact('products', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'upload' => 'required|mimes:jpg,jpeg,png,gif,webp'
       ], [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'Giá tiền không được để trống',
            'price.numeric' => 'Giá tiền phải là số',
            'upload.required' => 'Ảnh đại diện không được để trống',
            'upload.mimes' => 'Định dạng ảnh cho phép là: jpg,jpeg,png,gif,webp'
       ]);
        $image_hash_name = $request->upload->hashName();
        $request->upload->move(public_path('uploads'), $image_hash_name);
        
        $data = $request->all('name', 'price','content','sale_price', 'category_id', 'status');
        $data['image'] = $image_hash_name;
        
        if (Product::create($data)) {
            return redirect()->route('product.index')->with('yes', 'Thêm mới thành công');
        }

        return redirect()->back()->with('no','Thêm mới không thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::all();
        return view('admin.product.edit', compact('product', 'cats'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'upload' => 'required|mimes:jpg,jpeg,png,gif,webp'
           ], [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên đã tồn tại',
                'price.required' => 'Giá tiền không được để trống',
                'price.numeric' => 'Giá tiền phải là số',
                'upload.required' => 'Ảnh đại diện không được để trống',
                'upload.mimes' => 'Định dạng ảnh cho phép là: jpg,jpeg,png,gif,webp'
           ]);
            $image_hash_name = $request->upload->hashName();
            $request->upload->move(public_path('uploads'), $image_hash_name);
    
            $data = $request->all('name', 'price','content', 'category_id', 'status');

            $data['image'] = $image_hash_name;
        
            if ($product->update($data)) {
                return redirect()->route('product.index')->with('yes', 'Cập nhật dữ liệu thành công');;
            }
    
            return redirect()->back()->with('no','Có lỗi, vui lòng thử lại');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
