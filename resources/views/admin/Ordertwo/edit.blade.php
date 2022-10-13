@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
     Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Data</li>
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
                <h3 class="card-title">Edit Order Data Here</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('buyitem.update', $buy->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Order Id</label>
                    <input type="text" name="orderid" class="form-control" placeholder="orderid">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number</label>
                    <input type="text" name="number" class="form-control" placeholder="number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Total</label>
                    <input type="text" name="subtotal" class="form-control" placeholder="subtotal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">D. Charge</label>
                    <input type="text" name="dcharge" class="form-control" placeholder="dcharge">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total </label>
                    <input type="text" name="total" class="form-control" placeholder="total">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Method</label>
                    <input type="text" name="paymentmethod" class="form-control" placeholder="paymentmethod">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                    <input type="text" name="status" class="form-control" placeholder="status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Active Status</label>
                    <input type="text" name="activestatus" class="form-control" placeholder="activestatus">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Order date</label>
                    <input type="text" name="orderdate" class="form-control" placeholder="orderdate">
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
  @endsection -->