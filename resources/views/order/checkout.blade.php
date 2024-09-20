@extends('public.main')

@section('main')
 
<div class="container" style="margin-top: 180px">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Product</th>
                            <th class="column-2">Name</th>
                            <th class="column-3">Price</th>
                            <th class="column-4">Quantity</th>
                            <th class="column-5">Total</th>
                        </tr>
                        {{ $total = 0 }}
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
                                    <div style="visibility: hidden" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        
                                    </div>
                                    
                                        <span class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" >{{ $item->quantity }}</span>
                                    
                                    <div style="visibility: hidden" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                       
                                    </div>
                                </div>
                                
                                </form>
                            </td>
                            <td class="column-5">{{ number_format($item->quantity * ( $item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0))) }}đ</td>
                            {{ $total += $item->quantity * ( $item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0)) }}
                        </tr>
                        @endforeach

                        
                    </table>
                </div>

                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <div class="flex-w flex-m m-r-20 m-tb-5">
                        
                            
                        <a href="{{ route('public.shop') }}" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                            Continue Shopping
                        </a>
                    </div>

                    
                </div>
            
            </div>
        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Check out
                </h4>

                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Subtotal:
                        </span>
                    </div>

                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            {{number_format( $total) }}đ
                        </span>
                    </div>
                </div>

                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                    

                    <form method="POST" class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                       @csrf
                        
                        <div class="p-t-15">
                            
                            <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9" style="width: 290px">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" value="{{ $auth->name }}" type="text" name="name" placeholder="Input name">
                                
                            </div>

                            <div class="bor8 bg0 m-b-12" style="width: 290px">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" value="{{ $auth->email }}" type="email" name="email" placeholder="Input email">
                            </div>

                            <div class="bor8 bg0 m-b-22" style="width: 290px">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" value="{{ $auth->phone }}" type="text" name="phone" placeholder="Input phone">
                            </div>

                            <div class="bor8 bg0 m-b-22" style="width: 290px">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" value="{{ $auth->address }}" type="text" name="address" placeholder="Input address" >
                            </div>

                        </div>
                    
                </div>

                <div class="flex-w flex-t p-t-27 p-b-33">
                    <div class="size-208">
                        <span class="mtext-101 cl2">
                            Total:
                        </span>
                    </div>

                    <div class="size-209 p-t-1">
                        <span class="mtext-110 cl2">
                            {{number_format( $total) }}đ
                        </span>
                    </div>
                </div>

                <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Proceed to Checkout
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection