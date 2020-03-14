@extends('backend/layout/default')

<body class="hold-transition sidebar-mini layout-fixed">

@section('content')

<div class="wrapper">



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Block Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{URL::to('')}}/admin">Admin</a></li>
            <li class="breadcrumb-item active">Block Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content-header -->
  {{-- ye kaam jb addtocart ho jae to upar message show krwany k liye h jquery k through. --}}

  @if(session()->has('message'))
  <div class="alert alert-success" style="color: white; background: blue;">
    {{ session()->get('message') }}
  </div>
  @endif
  {{-- ye kaam jb addtocart ho jae to upar message show krwany k liye h jquery k through. end --}}

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">All Block Users</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $u)
                  <tr>
                    <td>{{ $u->id }}</td>
                    <td><img class="image-fluid" src="{{URL::to('/public/assets/images/'.$u->image)}}" style="width:50px; height:50px;" alt=""></td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->address }}</td>
                    <td>
                      <a href="{{URL::to('')}}/user/active/{{ $u->id }}" type="button" class="btn btn-block btn-primary">
                        Active
                      </a>
                      <a href="{{URL::to('')}}/user/delete/{{ $u->id }}" type="button" class="btn btn-block btn-danger">
                        Delete
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper --> 

@stop