<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->keyword;
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);
        if($key) {
            $orders = Order::where('name', 'LIKE', '%'.$key.'%')->paginate();
        }
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
       $data = $request->only('status');
       if ($order->update($data)) {
        return redirect()->route('order.index')->with('yes', 'Cập nhật dữ liệu thành công');;
    }

    return redirect()->back()->with('no','Có lỗi, vui lòng thử lại');
    
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function dtl() {
        $cats = Category::orderBy('name', 'ASC')->get();
        $products = Product::filter()->orderBy('created_at', 'DESC')->paginate(5);
        return view('order.detail', compact('cats', 'products'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Order $order)
    // {
    //     $order->delete();
    //     return redirect()->route('order.index');
    // }
}
