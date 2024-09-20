@extends('admin.main')

@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                    <h4 class="card-title">Người dùng</h4>
                </div>
                
             
              </div>
              </p>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>{{ $user -> id }}</td>
                            <td>{{ $user -> name }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>{{ $user -> password }}</td>
                            <td>{{ $user -> created_at}}</td>
                            <td>{{ $user -> updated_at}}</td>
                            
                        </tr>
                        
                    @endforeach
                  </tbody>
                </table>
                {{ $data->links() }}
              </div>
            </div>
         
@endsection