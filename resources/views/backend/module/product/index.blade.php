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
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{URL::to('')}}/admin">Admin</a></li>
            <li class="breadcrumb-item active">Users</li>
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
            <h1 class="card-title">All Users</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Category_id</th>
                <th>Category Name</th>
               <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($p as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td><img class="image-fluid" src="{{URL::to('/public/assets/images/'.$product->product_image)}}" style="width:50px; height:50px;" alt=""></td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->catg_name }}</td>

                    <td>
                      <a href="{{URL::to('')}}/product/edit/{{ $product->id }}" type="button" class="btn btn-block btn-info">
                        Edit
                      </a>
                      <a href="{{URL::to('')}}/product/block/{{ $product->id }}" type="button" class="btn btn-block btn-warning">
                        Block
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