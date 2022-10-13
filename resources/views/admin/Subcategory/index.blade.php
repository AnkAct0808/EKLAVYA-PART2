@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Our Subcategory Data</h3>
          <div class="text-right">
          <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('childcategory.create') }}">ADD Subcategories</a></button>
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S.no</th>
              <th>category name</th>
                <th>Subcategory</th>
                <th>Sub Title</th>
                <th>Image</th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subcat as $key=> $temp )
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $temp->ankita }}</td>
                <td>{{ $temp->subcategory }}</td>
                <td>{{ $temp->subtitle }}</td>
                <td><img class="img-circle"style="height:40px; width:40px;" src="{{asset('assets/uploads/image/' .$temp->image )}}" alt=""></td>
                
                <td>
                     <form action="{{ route('childcategory.destroy', $temp->id) }}" method="POST" >
                        <a href="{{ route('childcategory.edit', $temp->id) }}"> <i class="fa fa-cloud"></i></a>
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