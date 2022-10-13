  @extends('admin.main.layout')
@section('adcontent')
 <div class="content-wrapper">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><STRONG>OUR Manage product Data</STRONG></h3>
          <div class="text-right">
          <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('manage.create') }}">ADD manage product</a></button>
          </div>
         
        </div>
       
          <div class="card-body table-responsive p-0" style="height: 300px;">
          <table id="example1"class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>productname</th>
                <th>categoryname</th>
                <th>Subcategory</th>
                <th>measurment</th>
                <th>stock</th>
                <th>availability</th>
                <th>description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($mpro as $key=> $temp )
              <tr>
              
                <td>{{ ++$key }}</td>
                <td>{{ $temp->productname }}</td>
                <td>{{ $temp->categoryname }}</td>
                <td>{{ $temp->subcategory }}</td>
                <td>{{ $temp->measurment }}</td>
                <td>{{ $temp->stock }}</td>
                <td>{{ $temp->availability }}</td>
                <td>{{ $temp->discription }}</td>
                <td><img class="img-circle"style="height:40px; width:40px;" src="{{asset('assets/uploads/image/'.$temp->image )}}" alt=""></td>
                <td>
                     <form action="{{ route('manage.destroy', $temp->id) }}" method="POST" >
                        <a href="{{ route('manage.edit', $temp->id) }}"> <i class="fas fa-edit"></i></a>
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
       
      </div>
     
    </div>
  </div>
</div>
  @endsection   