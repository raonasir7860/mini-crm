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
                <table class="table table-bordered display" id="table_id">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Company</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 0;
                    @endphp
                  @foreach ($employees as $employee)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{$employee->first_name}}</td>
                      <td>{{$employee->last_name}}</td>
                      <td>{{$employee->email}}</td>
                      <td>{{$employee->phone}}</td>
                      <td>{{@$employee->company->name}}</td>
                      <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
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
              <form action="{{ route('employees.store') }}" method="POST">
              @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name = "first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name = "last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" name = "phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Company</label>
                    <select name="comapny_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    @foreach($companies as $company)
                      <option value="{{$company->id}}">{{$company->name}}</option>
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