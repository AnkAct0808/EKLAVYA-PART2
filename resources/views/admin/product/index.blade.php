@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Our Products Data</h3>
          <div class="text-right">
          <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('cat.create') }}">ADD Products</a></button>
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>s.no</th>
                <th>productName</th>
                <th>product Category</th>
                <th>product subCategory</th>
                <th> Product Image</th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categaries as $temp )
              <tr>
                <td>{{ $temp->id }}</td>
                <td>{{ $temp->productname }}</td>
                <td>{{ $temp->productcategory }}</td>
                <td>{{ $temp->productsubcategory }}</td>
                <td><img class="img-circle"style="height:40px; width:40px;" src="{{asset('assets/uploads/image/'.$temp->productimage )}}" alt=""></td>
                
                <td>
                     <form action="{{ route('cat.destroy', $temp->id) }}" method="POST" >
                        <a href="{{ route('cat.edit', $temp->id) }}"> <i class="fa fa-cloud"></i></a>
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