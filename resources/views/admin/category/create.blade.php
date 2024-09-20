@extends('admin.main')

@section('main')

      <div class="page-header">
        
      </div>
      <div class="row">
        
        
                
        
       
        
        
        
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Thêm mới</h4>
              <form action="{{ route('category.store') }}" class="form-sample" method="POST">
                @csrf
                
                
                <div class="row">
                  <div class="col-md-6" >
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Input field" style="width: 400px;color: white"> 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="0" checked>Tạm ẩn</label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="1">Hiển thị</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

@endsection