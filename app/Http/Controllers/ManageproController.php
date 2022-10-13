<?php

namespace App\Http\Controllers;
use App\Models\managepro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ManageproController extends Controller
{
    public function index()
    {
        $mpro= DB::table('managepros')->get();
        return view('admin.manageproduct.index',compact('mpro'));
    }


    public function create()
    {
        return view('admin.manageproduct.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'categoryname' => 'required',
            'subcategory' => 'required',
            'measurment' => 'required',
            'stock' => 'required',
            'availability' => 'required',
            'discription' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
           
        ]);
    $data = $request->all();
    $result = new managepro;
    $result->productname = $data['productname'];
   $result->categoryname = $data['categoryname'];
   $result->subcategory = $data['subcategory'];
   $result->measurment = $data['measurment'];
   $result->stock = $data['stock'];
   $result->availability = $data['availability'];
   $result->discription = $data['discription'];
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('manage.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        
        $mpro=managepro::get();
        return view('admin.manageproduct.index',compact('mpro'));
    }



    public function update($id,Request $request)
    {
        $result = managepro::find($id);
        $data = $request->all();
        $result->productname = $data['productname'];
   $result->categoryname = $data['categoryname'];
   $result->subcategory = $data['subcategory'];
   $result->measurment = $data['measurment'];
   $result->stock = $data['stock'];
   $result->availability = $data['availability'];
   $result->discription = $data['discription'];
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('manage.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
         $mpro = managepro::find($id);
         return view('admin.manageproduct.edit',['mpro'=> $mpro]);
    }
    public function destroy($id)
    {
        $mpro=managepro::find($id);
        $mpro->delete();

        return redirect()->route('manage.index')
            ->with('success','Deleted successfully');
    }
}