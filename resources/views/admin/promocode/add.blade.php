 @extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
     Content Header (Page header) 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Promo Code</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Promo Code</li>
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
                <h3 class="card-title">Add Promo Code Here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('prom.index') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Promocode</label>
                    <input type="text" name="promocode" class="form-control" placeholder="promocode">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Message</label>
                    <input type="text" name="message" class="form-control" placeholder="message">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">start Date</label>
                    <input type="text" name="startdate" class="form-control" placeholder="startdate">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="text" name="enddate" class="form-control" placeholder="enddate">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No of User</label>
                    <input type="text" name="noofuser" class="form-control" placeholder="noofuser">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Minimum Order Amount </label>
                    <input type="text" name="minimumorderamount" class="form-control" placeholder="minimumorderamount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discount</label>
                    <input type="text" name="discount" class="form-control" placeholder="discount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discount Type</label>
                    <input type="text" name="discounttype" class="form-control" placeholder="discounttype">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Maximum Discount Amount</label>
                    <input type="text" name="Maximumdiscountamount" class="form-control" placeholder="Maximumdiscountamount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Repeat Usage</label>
                    <input type="text" name="repeatusage" class="form-control" placeholder="repeatusage">
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Repeat usage</label>
                    <input type="text" name="noofrepeatusage" class="form-control" placeholder="noofrepeatusage">
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