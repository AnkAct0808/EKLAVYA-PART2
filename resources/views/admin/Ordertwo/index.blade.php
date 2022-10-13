@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Our Order Data</h3>
          <div class="text-right">
          <!-- <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('buyitem.create') }}">ADD order data</a></button> -->
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S.no</th>
              <th>Order id</th>
                <th>Name</th>
                <th>Number</th>
               <th>SubTotal</th>
               <th>Discount charge</th>
               <th>Total </th>
               <th>Payment Method</th>
               <th>Status </th>
               <th>Active Status</th>
               <th>Order Date </th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($buy as $key=> $temp )
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $temp->orderid }}</td>
                <td>{{ $temp->name }}</td>
                <td>{{ $temp->number }}</td>
                <td>{{ $temp->subtotal }}</td>
                <td>{{ $temp->dcharge }}</td>
                <td>{{ $temp->total }}</td>
                <td>{{ $temp->paymentmethod }}</td>
                <td>{{ $temp->status }}</td>
                <td>{{ $temp->activestatus }}</td>
                <td>{{ $temp->orderdate }}</td>
                <td>
                <form action="{{ route('buyitem.destroy', $temp->id) }}" method="POST" >
                <a href="{{ route('buyitem.edit', $temp->id) }}"> <i class="fa fa-cloud"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border:none"> <i class="fa fa-trash text-danger"></i></button>
                            </form>
                          </td>
                        </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
  @endsection