@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Homesliders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">homeslider</li>
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
                <h3 class="card-title">Add Homesliders data Here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('hom.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                
                  @error('name')
   <span class="text-danger">{{$message}}</span>
@enderror
                  
  
<div class="form-group">
                    
                    <label for="exampleInputEmail1">Category </label>
                    <select class="form-control" name="category">
                     <option value="None">---SELECT Category---</option>
                     @foreach ($home as $temp)
                     <option value="{{ $temp->id }}">{{ $temp->name }}</option>
                     @endforeach
                   </select>

                  <div class="form-group">
                    <label for="exampleInputEmail1"> subcategory</label>
                    <input type="text" name="subcategory" class="form-control" placeholder="subcategory">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image"  class="form-control"  placeholder="Image">
                    @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
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