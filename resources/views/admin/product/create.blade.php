@extends('admin.main')

@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        
      </div>
      <div class="row">
        
        
                
        
       
        
        
        
        <div class="col-12 grid-margin">
          <div class="card" style="margin-top: -110px">
            <div class="card-body">
              <h4 class="card-title">Thêm mới</h4>
              <form action="{{ route('product.store') }}" class="form-sample" method="POST" enctype="multipart/form-data">
                @csrf
                
                
                <div class="row">
                  <div class="col-md-6" >
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Input field" style="width: 400px;color: white" > 
                      @error('name')
                      <small class="help-block" style="margin-left: 150px; margin-top: 15px">{{$message}}</small>
                        @enderror
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


                <div class="row">
                    <div class="col-md-6" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="Input field" style="width: 400px;color: white">
                        @error('price')
                      <small class="help-block" style="margin-left: 150px; margin-top: 15px">{{$message}}</small>
                        @enderror 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                                <select name="category_id" class="form-control" style="color: white">
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}" style="color: white">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                              
                          </div>
                        </div>
                       
                      </div>
                    </div>
                  </div>

              

                  <div class="row">
                    <div class="col-md-6" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Image</label>
                        <input type="file" class="form-control" name="upload" placeholder="Input image" style="width: 400px;color: white" > 
                        @error('upload')
                        <small class="help-block" style="margin-left: 150px; margin-top: 15px">{{$message}}</small>
                          @enderror 
                      </div>
                    </div>
                    <div class="col-md-6" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sale</label>
                        <input type="text" class="form-control" name="sale_price" value="{{old('sale_price')}}" placeholder="Input field" style="width: 400px; color: white">
                        
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-12" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Content</label>
                        <textarea  class="form-control content" name="content" value="{{ old('content') }}"  style="width: 600px; height: 200px;color: white"> </textarea>
                        
                      </div>
                    </div>
                    
                  </div>

                  
               

               
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

          
@endsection
@section('style')
<link rel="stylesheet" href="backend/summernote/summernote.min.css">
@endsection()

@section('script')
<script src="backend/summernote/summernote.min.js"></script>
<script>
    $('.content').summernote({
        height: 250
    });
</script>
@endsection()