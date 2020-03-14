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
                <h3 class="card-title">Set Permissions</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            

              <form  action="{{ URL::to('admin/role_per_edit') }}" method="post">
                
                  {{ CSRF_field() }}

                  <input type="hidden" name="id" value="{{ $role }}">

             <!--      @if($data == null)
                      <input type="hidden" name="id" value="-1">
                  @else  
                     <input type="hidden" name="id" value="{{ isset($data[0]) ? $data[0]->role_id : 0 }}">
                  @endif  -->          


                   <div class="card-body">
                  <div class="form-group">

                    <label for="exampleInputEmail1">Role permissions</label><br>
                

                @php 

                  $l=0;

                @endphp 

                @foreach($per as $item)
                
                  @if(count($data) > $l)
                  
                        @if($item->id == $data[$l]->permission_id)

                            <input type="checkbox"   name="permission[]" checked="checked" value="{{ $item->id }}"> {{ $item->name }} 
                            &nbsp;&nbsp;&nbsp;<small style="color:red;"> User has already this permisson</small><br>
                       
                            @php
                       
                                $l++;
                      
                            @endphp


                        @else
                            <input type="checkbox" name="permission[]" value="{{ $item->id }}"> {{ $item->name }} <br>
                            @php

                               $l++; 

                            @endphp

                        @endif

                  @else
                    
                      <input type="checkbox" name="permission[]" value="{{ $item->id }}"> {{ $item->name }} <br>

                  @endif 

                 

                @endforeach

              </div>
            </div>
        
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Set</button>
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