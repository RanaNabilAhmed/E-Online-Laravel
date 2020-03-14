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
            <h1>Add New Category</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- row start -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Main Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('')}}/category/edit" method="post">
                <div class="card-body">
                  {{csrf_field()}}

                   <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="catg_name" value="{{$category->catg_name}}">
                  </div>
                  
                  
               
                   <div class="form-group">
                    <label for="exampleInputPassword1">Parent Category</label>
                    <select name="parent">
                      <option value="" selected>select</option>
                      @foreach($cat as $aa)
                    <option value="{{$aa->ct_id}}">{{$aa->catg_name}}</option>
                    @endforeach

                    </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
          </div>
          

          </div>
          <!--/.col (left) -->
          <!-- left column -->
          
                 
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@stop


