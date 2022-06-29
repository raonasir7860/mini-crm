@extends('home')
@section('content')
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Company</h3>
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
              <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name = "name" value="{{ $company->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name = "email"  value="{{ $company->email }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="text" name = "website"  value="{{ $company->website }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Website">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    @if($company->logo)
                        <img src="{{asset('storage/'.$company->logo) }}" height="100px" width="100px">
                      @else
                        No Logo
                      @endif
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