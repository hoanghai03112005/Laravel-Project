@extends('admin.main')

@section('main')

      <div class="page-header">
        
      </div>
      <div class="row">
        
        
                
        
       
        
        
        
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sửa danh mục</h4>
              <form action="{{ route('category.update', $category->id) }}" class="form-sample" method="POST">
                @csrf @method('PUT')
                
                
                <div class="row">
                  <div class="col-md-6" >
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Input field" value="{{ $category->name }}" style="width: 400px" style="color: white"> 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="0" {{ $category->status == 0 ? 'checked' : '' }}>Tạm ẩn</label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="1" {{ $category->status == 1 ? 'checked' : '' }}>Hiển thị</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

@endsection