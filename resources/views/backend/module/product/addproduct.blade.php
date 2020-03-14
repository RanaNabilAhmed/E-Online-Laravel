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
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Products</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ URL::to('/product/create') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Description">
                      </div> 
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount</label>
                                <input type="text" name="discount" class="form-control" id="exampleInputEmail1" placeholder="Enter Discount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Category</label>
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

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Manufacture Date</label>
                        <input type="date" name="m_date" class="form-control" id="exampleInputEmail1" placeholder="Enter Title Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Expiry Date</label>
                        <input type="date" name="e_date" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Description">
                      </div> 
                    </div>
                </div>   

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


