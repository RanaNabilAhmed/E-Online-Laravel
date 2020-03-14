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
             <form role="form" action="{{ URL::to('/category/create/main') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Main Category</label>
                          <input type="text" name="cat_main_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Main Category">
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
          

          </div>
          <!--/.col (left) -->
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" action="{{ URL::to('/category/create/sub') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Sub Category</label>
                          <input type="text" name="cat_sub_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Name">
                        </div>
                      </div>
                      
                  </div>
                  <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Main Category</label>
                                  <select name="parent_id" id="" class="form-control">
                                    @foreach($cat as $main)
                                    <option style="color:red;" value="{{$main->ct_id}}">
                                        {{$main->catg_name}}
                                          <?php $subcat =DB::table('categorys')->where('parent_id',$main->ct_id)->get(); ?>
                                          @foreach($subcat as $subcats)
                                          <option  value="{{$subcats->ct_id}}" style="color: blue;">{{$subcats->catg_name}}</option>
                                          <?php $subchild=DB::table('categorys')->where('parent_id',$subcats->ct_id)->get(); ?>
                                          @foreach($subchild as $child)
                                          <option  value="{{$child->ct_id}}">{{$child->catg_name}}
                                            @endforeach
                                          @endforeach
                                      
                                      </option>
                                      @endforeach
                                  </select>
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


