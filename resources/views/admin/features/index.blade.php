@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Our Features Data</h3>
          <div class="text-right">
           <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('fees.create') }}">ADD Features</a></button> 
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>product</th>
                <th>stage</th>
                <th>image</th>
                <th>Title</th>
               <th>Description</th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($fee as $key=> $temp )
              <tr>
                <td>{{ ++$key }}</td>
               <td>{{ $temp->product }}</td>
                <td>{{ $temp->stage }}</td>
                <td><img class="img-circle"style="height:40px; width:40px;" src="{{asset('assets/uploads/image/'.$temp->image )}}" alt=""></td>
                <td>{{ $temp->title }}</td>
                <td>{{ $temp->description }}</td>
                 <td>
                 <form action="{{ route('fees.destroy', $temp->id) }}" method="POST" >
                        <a href="{{ route('fees.edit', $temp->id) }}"> <i class="fas fa-edit"></i></a>
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