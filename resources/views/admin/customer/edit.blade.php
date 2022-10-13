@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer data</li>
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
                <h3 class="card-title">Edit Customer data Here</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('custom.update', $home->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" id="name" class="form-control"  value="{{ $cus->name }}"  placeholder="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number</label>
                    <input type="text" name="number" id="number" class="form-control"  value="{{ $cus->number }}"  placeholder="number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email id</label>
                    <input type="text" name="emailid" id="emailid" class="form-control"  value="{{ $cus->emailid }}"  placeholder="emailid">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">state</label>
                    <input type="text" name="state" id="state" class="form-control"  value="{{ $cus->state }}"  placeholder="state">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" name="city" id="city" class="form-control"  value="{{ $cus->city }}"  placeholder="city">
                  </div>
                  <br>
                  <img src="{{asset('assets/uploads/image/'.$cus->image )}}" id="imgprv">
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