@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
<div class="row">     
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  /> -->
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
      <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><STRONG>OUR Homesliders</STRONG></h3>
          <div class="text-right">
          <button class="pull-right btn-success btn"><a class="text-white" href="{{ route('hom.create') }}">ADD Homesliders</a></button>
          </div>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table id="example1"class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>category</th>
                <th>Subcategory</th>
                
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($home as $key=> $temp )
              <tr>
              
                <td>{{ ++$key }}</td>
                <td>{{ $temp->category }}</td>
                <td>{{ $temp->subcategory }}</td>
               
                
                
                <td><img class="img-circle"style="height:40px; width:40px;" src="{{asset('assets/uploads/image/'.$temp->image )}}" alt=""></td>
                <td>
                     <form action="{{ route('hom.destroy', $temp->id) }}" method="POST" >
                        <a href="{{ route('hom.edit', $temp->id) }}"> <i class="fas fa-edit"></i></a>
                        
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
<!-- <script>
   $(function() { 
           $('.toggle-class').change(function() { 
           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/status/update', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
</script> -->
  @endsection