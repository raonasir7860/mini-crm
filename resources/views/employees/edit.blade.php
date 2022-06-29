@extends('home')
@section('content')
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
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
              <form action="{{ route('employees.update',$employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name = "first_name" value="{{ $employee->first_name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name = "last_name" value="{{ $employee->last_name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name = "email" value="{{ $employee->email }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" name = "phone" value="{{ $employee->phone }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Company</label>
                    <select name="comapny_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $employee->comapny_id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                    </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection