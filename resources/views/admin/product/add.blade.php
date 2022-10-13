@extends('admin.main.layout')
@section('adcontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">image</li>
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
                <h3 class="card-title">Add category Here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"> product name</label>
                    <input type="text" name="productname" class="form-control" placeholder="productname">
                  </div><div class="form-group">
                    <label for="exampleInputEmail1"> Category</label>
                    <input type="text" name="category" class="form-control" placeholder="category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Sub Category</label>
                    <input type="text" name="subcategory" class="form-control" placeholder="subcategory">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Brands</label>
                    <input type="text" name="brands" class="form-control" placeholder="brands">
                  </div>
          
<hr>

<div class="row">
    <div class="col-md-2">
        <div class="form-group packate_div">
            <label for="exampleInputEmail1">Measurement</label><input type="text" class="form-control" name="measurement[]" required />
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group packate_div">
            <label for="unit">Unit:</label>
            <select class="form-control" name="measurement_unit_id[]">
                @foreach ($Product as $Product )
                <option value="{{$Product->id}}">{{$Product->name}}</option>
                @endforeach

             </select>
        </div>
    </div>
     <div class="col-md-2">
        <div class="form-group packate_div">
            <label for="price">Quantity</label><input type="text" class="form-control" name="qty[]" id="qty" required />
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group packate_div">
            <label for="price">Price  (₹):</label><input type="text" class="form-control" name="price[]" id="packate_price" required=""  onchange="return this.value = parseFloat(this.value).toFixed(2);" name="pr" id="pr" />
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group packate_div">
            <label for="discounted_price">Discounted Price(₹):</label>
            <input type="text" class="form-control" name="discounted_price[]" id="discounted_price" required=""  onchange="return this.value = parseFloat(this.value).toFixed(2);" name="cr" id="cr"/>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group packate_div">
            <label for="qty">Stock:</label>
            <input type="text" class="form-control" name="stock[]"  required/>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group packate_div">
            <label for="unit">Unit:</label>
            <select class="form-control" name="stock_unit_id[]">
            @foreach ($Product as $id )
            <option value="{{$Product->id}}">{{$Product->name}}</option>
            @endforeach

            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group packate_div">
            <label for="qty">Status:</label>
            <select name="isavailable[]" class="form-control" required>
                <option value="Available">Available</option>
                <option value="Sold Out">Sold Out</option>
            </select>
        </div>
    </div>
    <div class="col-md-1">
        <label>Variation</label>
        <a id="add_packate_variation" title="Add variation of product" style="cursor: pointer;"><i class="fas fa-plus-square fa-2x"></i></a>
    </div>

    <div id="variations">
    </div>
    <hr>

</div>

<hr>

<div class="form-group">
    <label for="image">Main Image :&nbsp;&nbsp;&nbsp;*Please choose square image of larger than 350px*350px & smaller than 550px*550px.</label>
     <br><input type="file" name="image" accept="image/*" onchange="loadImg()" id="image" required>
     <br>


  <div >
    <img  class="d-none m-3" height="200" id="frame" />
</div>

</div>
<div class="form-group">
    <label for="other_images">Other Images of the Product: *Please choose square image of larger than 350px*350px & smaller than 550px*550px.</label>
    <br><input type="file" name="other_images[]" accept="image/*" id="other_images" multiple>
</div>

<hr>


<div class="form-group">

    <h5> Descripton: </h5> <br>


    <div class="col-md-12" >

          <textarea name="description" id="summernote" >

          </textarea>

      </div>
    </div>


</div>
        

<hr>

<div class="form-group">

    <h5>Short Descripton: </h5> <br>


    <div class="col-md-12" >

          <textarea name="short_desc" id="summernote" rows="6" >

          </textarea>

      </div>
    </div>






<div class="card-footer">
    <button type="submit" class="btn btn-primary">Add </button>
    <button type="reset" class="btn btn-warning">clear </button>
  </div>



</div>

</form>
</div>




@endsection





















