@extends('admin.main')

@section('main')

      
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                    <h4 class="card-title">Danh mục</h4>
                </div>
                <div class="col-md-2">
                    <a class="nav-link btn btn-success create-new-button" href="{{ route('category.create') }}">+ Create New</a>
                </div>
             
              </div>

              {{-- Form tìm kiếm --}}
              <form action="" method="GET" class="form-inline" role="form">
    
                <div class="form-group">
                  <input class="form-control" name="keyword" placeholder="Input keyword" style="color: white">
                </div>
              
          
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
              </form>
              {{-- Form tìm kiếm --}}
              
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Quantity of products</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cats as $cat)
                        <tr>
                            <td>{{ $cat -> id }}</td>
                            <td>{{ $cat -> name }}</td>
                            <td>{{ $cat -> status == 1 ? 'Hiển thị' : 'Tạm ẩn' }}</td>
                            <td>{{ $cat -> products -> count() }}</td>
                            <td>{{ $cat -> created_at}}</td>
                            <td>{{ $cat -> updated_at}}</td>
                            <td>
                                <form action="{{ route('category.destroy', $cat->id) }}" method="POST" role="form">
                                    @csrf @method('DELETE')
                                    <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                                    <button  class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                  </tbody>
                </table>
                {{ $cats->links() }}
              </div>
            </div>
         

        
        
        

@endsection