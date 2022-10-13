@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Our Order Data</h3>
          <div class="text-right">
          <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('prom.create') }}">ADD categories</a></button>
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S.no</th>
              <th>promocode</th>
                <th>message</th>
                <th>startdate</th>
               <th>Enddate </th>
               <th>no of users</th>
               <th>Minimum Order Amount</th>
               <th>Discount</th>
               <th>Discount Type</th>
               <th>Maximum Discount Amount</th>
               <th>Repeat Usage</th>
               <th>No of Repeat Usage</th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pro as $key=> $temp )
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $temp->promocode }}</td>
                <td>{{ $temp->message }}</td>
                <td>{{ $temp->startdate }}</td>
                <td>{{ $temp->Enddate }}</td>
                <td>{{ $temp->noofusers }}</td>
                <td>{{ $temp->minimumorderamount }}</td>
                <td>{{ $temp->discount }}</td>
                <td>{{ $temp->discounttype }}</td>
                <td>{{ $temp->maximumdiscountamount }}</td>
                <td>{{ $temp->repeatusage }}</td>
                <td>{{ $temp->noofrepeatusage }}</td>
                
                
                <td>
                     <form action="{{ route('prom.destroy', $temp->id) }}" method="POST" >
                        <a href="{{ route('prom.edit', $temp->id) }}"> <i class="fa fa-cloud"></i></a>
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