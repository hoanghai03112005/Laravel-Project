@extends('public.main')

@section('main')
<div class="container" style="margin-top: 180px">
    <h1 style="text-align: center">Cửa hàng quần áo Coza Store</h1>
    <p  style="text-align: center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia neque repudiandae repellendus quam fuga dolorem nulla praesentium deserunt ad maiores vitae a temporibus illum enim, exercitationem, magni id necessitatibus modi.</p>
    <h2 style="text-align: center; margin-top: 10px">Hoá đơn: Số #{{ $order->id }}</h2>
    <h5 style="text-align: center; margin-top: 10px">Họ tên: {{ $order->name }}</h5>
    <h5 style="text-align: center; margin-top: 10px">Email: {{ $order->email }}</h5>
    <h5 style="text-align: center; margin-top: 10px">Số điện thoại: {{ $order->phone }}</h5>
    <h5 style="text-align: center; margin-top: 10px">Địa chỉ: {{ $order->address }}</h5>
    <div class="row">
        <table class="table table-hover" style="margin-top: 20px">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                  
                        
                    @foreach ($order->details as $item)
                    <tr>
                        <td>
                            <img src="uploads/{{$item->product->image}}" alt="" width="45">
                        </td>
                        <td>{{$item->product->name}}</td>
                        <td>{{ number_format($item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0)) }}đ</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format(($item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0)) * $item->quantity)}}đ</td>
                    </tr>
                    @endforeach
                    
                </tr>
                
            </tbody>
        </table>
 
    </div>
</div>
@endsection