@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><STRONG>OUR Customers</STRONG></h3>
          <div class="text-right">
          <!-- <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('custom.create') }}">ADD Customers</a></button> -->
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table id="example1"class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email id</th>
                <th>State</th>
                <th>city </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cus as $key=> $temp )
              <tr>
              
                <td>{{ ++$key }}</td>
                <td>{{ $temp->name }}</td>
                <td>{{ $temp->number }}</td>
                <td>{{ $temp->emailid }}</td>
                <td>{{ $temp->state }}</td>
                <td>{{ $temp->city }}</td>
                
                <td>
                     <form action="{{ route('custom.destroy', $temp->id) }}" method="POST" >
                        <!-- <a href="{{ route('custom.edit', $temp->id) }}"> <i class="fas fa-edit"></i></a> -->
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