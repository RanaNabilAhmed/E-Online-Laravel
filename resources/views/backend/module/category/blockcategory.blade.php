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
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $u)
                  <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->firstname }} {{ $u->lastname }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->password }}</td>
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