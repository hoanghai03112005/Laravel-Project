@extends('public.main')

@section('main')
<div class="container" style="margin-top: 180px">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                        <th>STT</th>
                        <th>Order Date</th>
                        <th>TotalPrice</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                  
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                        <td>{{ number_format($item->totalAmount) }}đ</td>
                        <td>
                            @if ($item->status == 0)
                            <span>Chưa xác nhận</span>
                            @elseif ($item->status == 1)
                                <span>Đã xác nhận</span>
                            @elseif ($item->status == 2)
                                <span>Đang giao hàng</span>
                            @elseif ($item->status == 3)
                                <span>Đã giao hàng</span>
                        @endif
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ route('order.detail', $item->id) }}">Detail </a>
                        </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
</div>
@endsection