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
              <form action="{{ route('order.update', $order->id) }}" class="form-sample" method="POST" enctype="multipart/form-data" >
                @csrf @method('PUT')
                
                
                <div class="row">
                  
                  
                    
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="0" {{ $order->status == 0 ? 'checked' : '' }}>Chưa xác nhận</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="1" {{ $order->status == 1 ? 'checked' : '' }}>Đã xác nhận</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="2" {{ $order->status == 2 ? 'checked' : '' }}>Đang giao hàng</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status"  value="3" {{ $order->status == 3 ? 'checked' : '' }}>Đã giao hàng</label>
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
@endsection