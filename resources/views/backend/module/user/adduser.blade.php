@extends('backend/layout/default')

<body class="hold-transition sidebar-mini">

@section('content')
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    {{-- ye kaam jb addtocart ho jae to upar message show krwany k liye h jquery k through. --}}

			@if(session()->has('message'))
    <div class="alert alert-success" style="color: white; background: blue;">
        {{ session()->get('message') }}
    </div>
    @endif
    {{-- ye kaam jb addtocart ho jae to upar message show krwany k liye h jquery k through. end --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ URL::to('/user/create') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Name">
                      </div> 
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Password">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Password">
                            </div>
                        </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address: 01</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Line 01">
                            </div>
                        </div>
                        
                    </div>
                      <!--  -->
                      <label for="exampleInputEmail1">select role</label>
                      <?php $roles = config('roles.models.role')::get()->all();
                      ?>
                      <select name="role" id="">
                      @foreach($roles as $role)
                          <option value="{{ $role->name}}">{{ $role->name}}</option>
                      @endforeach    
                      </select>
                      <!--  -->
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop


