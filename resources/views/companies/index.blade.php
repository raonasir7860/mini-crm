@extends('home')
@section('content')
<h1>All Companies</h1>
              <!-- /.card-header -->
              <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table table-bordered display" id="table_id2">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Website</th>
                      <th>Logo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 0;
                    @endphp
                  @foreach ($companies as $company)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{$company->name}}</td>
                      <td>{{$company->email}}</td>
                      <td>{{$company->website}}</td>
                      <td>
                      @if($company->logo)
                        <img src="{{asset('storage/'.$company->logo) }}" height="100px" width="100px">
                      @else
                        No Logo
                      @endif
                      </td>
                      <td>
                    <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name = "name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name = "email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="url" name = "website" value="http:\\" class="form-control" id="exampleInputEmail1" placeholder="Enter Website">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose logo</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection