@extends('admin.main')

@section('main')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h4 class="card-title">Sản phẩm</h4>
            </div>
            <div class="col-md-2">
                <a class="nav-link btn btn-success create-new-button" href="{{ route('product.create') }}">+ Create New</a>
            </div>
         
          </div>
      <hr>
        
      {{-- Form tìm kiếm --}}

      <form action="" method="GET" class="form-inline" role="form">
    
        <div class="form-group">
          <input class="form-control" name="keyword" value="{{ old('name') }}" placeholder="Input keyword" style="color: white">
        </div>
        <div class="form-group">
          
          <select name="catId" class="form-control" style="color: white">
            <option value="">Chọn danh mục</option>
            @foreach($cats as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
           @endforeach
          </select>
          
        </div>
      
        <div class="form-group">
          
          <select name="order" class="form-control" style="color: white">
            <option value="">Sắp xếp mặc định</option>
            <option value="id-ASC">Tăng dần theo Id</option>
            <option value="id-DESC">Giảm dần theo Id</option>
  
            <option value="price-ASC">Tăng dần theo price</option>
            <option value="price-DESC">Giảm dần theo price</option>
  
            <option value="name-ASC">Tăng dần theo name</option>
            <option value="name-DESC">Giảm dần theo name</option>
  
            <option value="created_at-ASC">Tăng dần theo ngày tạo</option>
            <option value="created_at-DESC">Giảm dần theo ngày tạo</option>
          </select>
          
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
              <th>Category</th>
              <th> Price </th>
              <th>Sale</th>
              <th>Status</th>
              <th>Image</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($products as $prod)
            <tr>
                <td> {{$prod->id}} </td>
              <td> {{$prod->name}} </td>
              <td> {{$prod->cat->name}} </td>
              
              
              <td> {{ number_format($prod->price) }}đ </td>
              <td>{{ $prod->sale_price }}%</td>
              <td>{{ $prod -> status == 1 ? 'Hiển thị' : 'Tạm ẩn' }}</td>
              <td class="text-center">
                <img src="uploads/{{$prod->image}}" style="rounded-circle profile-pic">
              </td>
              <td>{{ $prod->created_at }}</td>
              <td>{{ $prod->updated_at }}</td>
              <td>
                <form action="{{ route('product.destroy', $prod->id) }}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{ route('product.edit', $prod->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <button  class="btn btn-sm btn-danger">Xóa</button>
                </form>
              </td>
            </tr>
            @endforeach
  
          </tbody>
        </table>
  
        <div>
          {{$products->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection