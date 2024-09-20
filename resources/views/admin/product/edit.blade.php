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
              <h4 class="card-title">Sửa</h4>
              <form action="{{ route('product.update', $product->id) }}" class="form-sample" method="POST" enctype="multipart/form-data" >
                @csrf @method('PUT')
                
                
                <div class="row">
                  <div class="col-md-6" >
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="Input field" style="width: 400px" style="color: white"> 
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
                            <input type="radio" class="form-check-input" name="status"  value="0" {{ $product->status == 0 ? 'checked' : '' }}>Tạm ẩn</label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="1" {{ $product->status == 1 ? 'checked' : '' }}>Hiển thị</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                    <div class="col-md-6" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Price</label>
                        <input type="text" class="form-control" value="{{ $product->price }}" name="price" placeholder="Input field" style="width: 400px" style="text-color: white"> 
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
                                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
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
                        <input type="file" class="form-control"  name="upload" placeholder="Input link image" style="width: 400px" style="color: white"> 
                        @error('upload')
                        <small class="help-block" style="margin-left: 150px; margin-top: 15px">{{$message}}</small>
                          @enderror 
                      </div>
                    </div>
                    <div class="col-md-6" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sale(%)</label>
                        <input type="text" class="form-control" name="sale_price" value="{{ $product->sale_price }}" placeholder="Input field" style="width: 400px; color: white">
                        
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Content</label>
                        <textarea class="form-control content" name="content"   style="color: white">{{ $product->content }} </textarea>
                        
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