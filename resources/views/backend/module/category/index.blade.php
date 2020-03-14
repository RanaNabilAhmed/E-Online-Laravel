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
            <h1 class="card-title">All Category</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Main Category</th>
                <th>Sub Category</th>
               <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($cat as $category)
                  
                  <tr>

                    <td>{{ $category->ct_id }}</td>
                    <td>{{ $category->catg_name }}</td>

                    {{-- <td> {{App\Category::getCatName($category->parent_id)}}</td> --}}
                    
                    <td>

                          @if(!empty($category->parent_id))
                              <?php $subcat=DB::table('categorys')->where('ct_id',$category->parent_id)->first(); ?>
                            {{$subcat->catg_name}}
                    </td>
                          @endif

                    <td>{{$category->status}}</td>
                    
                    <td>
                      <a href="{{URL::to('')}}/category/edit/{{ $category->ct_id }}" type="button" class="btn btn-block btn-info">
                        Edit
                      </a>
                      <a href="{{ URL::to('/category/delete/'.$category->ct_id) }}" type="button" class="btn btn-block btn-danger">
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