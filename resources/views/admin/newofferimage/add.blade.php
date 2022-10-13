@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New offer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Newoffer</li>
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
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add New offer data Here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                
                  @error('name')
   <span class="text-danger">{{$message}}</span>
@enderror

                    <div class="form-group">
                    <label for="exampleInputEmail1"> Category</label>
                    <input type="text" name="category" class="form-control" placeholder="category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">subcategory</label>
                    <input type="text" name="subcategory" class="form-control" placeholder="subcategory">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                  </div>
                  @error('image')
   <span class="text-danger">{{$message}}</span>
@enderror
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Title</label>
                    <input type="text" name="title" class="form-control" placeholder="title">
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1"> Description</label>
                    <input type="text" name="description" class="form-control" placeholder="description">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection