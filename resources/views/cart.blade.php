@extends('public.main')

@section('main')
    <div style="margin-top: 180px">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" >
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart" >
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2">Name</th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>

                            @foreach ($cart->items as $item)
                            
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="uploads/{{ $item->image }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{ $item->name }}</td> 
                                <td class="column-3">{{ number_format($item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0)) }}đ</td>
                                

                                <td class="column-4">
                                    <form method="POST" action="{{ route('cart.update', $item->id) }}">
                                        @csrf @method('PUT')
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        
                                        
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="{{ $item->quantity }}">
                                            
                                        
                                        

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <button class="flex-c-m stext-101 cl2  bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" style="width: 140px">
                                        Update Cart
                                    </button>
                                    <a href="{{ route('cart.delete', $item->id) }}" class="flex-c-m stext-101 cl2  bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" onclick="return confirm('Are you sure?')" style="width: 140px">Xóa</a>
                                    </form>
                                </td>
                                <td class="column-5">{{ number_format($item->quantity * ( $item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0))) }}đ</td>
                                
                            </tr>
                            @endforeach

                            
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <a href="{{ route('cart.clear') }}" onclick="return confirm('Are you sure?')" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Clear all
                            </a>
                            
                                
                            <a href="{{ route('public.shop') }}" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" style="margin-left: 270px; margin-right: 10px">
                                Continue Shopping
                            </a>
                            <a href="{{ route('order.checkout') }}" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" >
                                Check out
                            </a>
                        </div>

                        
                    </div>
                
                </div>
            </div>

            
        </div>
    </div>

@endsection