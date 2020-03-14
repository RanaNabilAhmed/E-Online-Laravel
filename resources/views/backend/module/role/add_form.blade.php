@extends('backend/layout/default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ URL::to('/admin/role') }}" method="post">
                {{ CSRF_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name of role">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Slug should not have capital letters or spaces.">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control">Enter description of the role.</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Role Level</label>
                    <select name="level" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>

                   <div class="form-group">
                       <label for="exampleInputPassword1">Role Permissions</label><br>

                    @foreach($data as $item)

                      <input type="checkbox" name="permissions[]" value="{{ $item->id }}" >&nbsp;&nbsp;&nbsp;{{ $item->name }}<br>

                    @endforeach

                   </div>
               
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

      
           

          </div>
          <!--/.col (left) -->
      
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop