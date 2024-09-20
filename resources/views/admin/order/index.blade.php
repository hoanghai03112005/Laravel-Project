@extends('admin.main')

@section('main')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h4 class="card-title">Đơn hàng</h4>
            </div>
            
         
          </div>
      <hr>
        
      {{-- Form tìm kiếm --}}

      <form action="" method="GET" class="form-inline" role="form">
    
        <div class="form-group">
          <input class="form-control" name="keyword" value="{{ old('name') }}" placeholder="Input keyword" style="color: white">
        </div>
        
    
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
      </form>

      {{-- Form tìm kiếm --}}



      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th> Phone </th>
              <th>Address</th>
              <th>Status</th>
              <th>Customer_id</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
                <td> {{$order->id}} </td>
              <td> {{$order->name}} </td>
              
              <td> {{$order->email}} </td>
              <td> {{$order->phone}} </td>
              <td> {{$order->address}} </td>
              
              <td>
                @if ($order->status == 0)
                    Chưa xác nhận
                @elseif ($order->status == 1)
                Đã xác nhận
                @elseif ($order->status == 2)
                Đang giao hàng
                @elseif ($order->status == 3)
                Đã giao hàng
                @else
                    Trạng thái không xác định
                @endif
            </td>



              <td> {{$order->customer_id}} </td>
              <td>{{ $order->created_at }}</td>
              <td>{{ $order->updated_at }}</td>
              <td>
                <form action="" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <a href="{{ route('admin.detail') }}" class="btn btn-sm btn-success">Detail</a>
                </form>
              </td>
            </tr>
            @endforeach
  
          </tbody>
        </table>
  
        <div>
          {{$orders->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection