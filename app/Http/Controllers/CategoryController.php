<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cats = Category::orderBy('created_at', 'desc')->paginate(5);
        $key = $request->keyword;

        if($key) {
            $cats = Category::where('name', 'LIKE', '%'.$key.'%')->paginate();
        }
        return view('admin.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:categories'
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại'
        ]);

        $data = $request->all('name', 'status');
        if(Category::create($data)) {
            return redirect()->route('category.index')->with('yes', 'Thêm mới thành công');
        }
        
        return redirect()->back()->with('no','Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id
        ]);

        $data = $request->all('name', 'status');
        if($category->update($data)) {
            return redirect()->route('category.index')->with('yes','Cập nhật dữ liệu thành công');
        }
        
        return redirect()->back()->with('no','Có lỗi, vui lòng thử lại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->products->count() == 0) {
            $category->delete();
            return redirect()->route('category.index')->with('yes','Xóa dữ liệu thành công');
        }
        return redirect()->route('category.index')->with('no','Xóa không thành công, danh mục này đang có sản phẩm, không thể xóa');
    }
}

