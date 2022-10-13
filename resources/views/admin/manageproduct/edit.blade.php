@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage product data</li>
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
                <h3 class="card-title">Edit Manage product data Here</h3>
              </div>

             
              <!-- form start -->
              <form id="quickForm" action="{{ route('manage.update', $mpro->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product name</label>
                    <input type="text" name="productname" id="productname" class="form-control"  value="{{ $mpro->productname }}"  placeholder="productname">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">categoryname</label>
                    <input type="text" name="categoryname" id="categoryname" class="form-control"  value="{{ $mpro->categoryname }}"  placeholder="categoryname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subcategory</label>
                    <input type="text" name="subcategory" id="subcategory" class="form-control"  value="{{ $mpro->subcategory }}"  placeholder="subcategory">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Measurment</label>
                    <input type="text" name="measurment" id="measurment" class="form-control"  value="{{ $mpro->measurment }}"  placeholder="measurment">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control"  value="{{ $mpro->stock }}"  placeholder="stock">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Availability</label>
                    <input type="text" name="availability" id="availability" class="form-control"  value="{{ $mpro->availability }}"  placeholder="availability">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discription</label>
                    <input type="text" name="discription" id="discription" class="form-control"  value="{{ $mpro->discription }}"  placeholder="discription">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" id="image" class="form-control"  value="{{ $mpro->image }}"  placeholder="image">
                    @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
                  </div>
                  <br>
                  <img src="{{asset('assets/uploads/image/'.$mpro->image )}}" id="imgprv">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Update</button>
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