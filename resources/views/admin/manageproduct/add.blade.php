 @extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </div>
        </div>
      </div>
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
                <h3 class="card-title">Add Manage product Here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('manage.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"> Product name</label>
                    <input type="text" name="productname" class="form-control" placeholder="productname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Category name</label>
                    <input type="text" name="categoryname" class="form-control" placeholder="categoryname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Subcategory</label>
                    <input type="text" name="subcategory" class="form-control" placeholder="subcategory">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Measurment</label>
                    <input type="text" name="measurment" class="form-control" placeholder="measurment">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="stock">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Availability</label>
                    <input type="text" name="availability" class="form-control" placeholder="availability">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discription</label>
                    <input type="text" name="discription" class="form-control" placeholder="discription">
                  </div>
                  @error('name')
   <span class="text-danger">{{$message}}</span>
@enderror
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                  </div>
                  @error('image')
   <span class="text-danger">{{$message}}</span>
@enderror
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