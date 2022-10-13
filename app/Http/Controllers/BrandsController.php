<?php

namespace App\Http\Controllers;
use App\Models\Brands;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $bran= DB::table('brands')->get();
        
        return view('admin.brand.index',compact('bran'));
    }


    public function create()
    {
        return view('admin.brand.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
    $data = $request->all();
    $result = new Brands;
    $result->name = $data['name'];
 
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('brandss.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        //
        $bran=Brands::get();
        return view('admin.brand.index',compact('bran'));
    }



    public function update($id,Request $request)
    {
        $result = Brands::find($id);
        $data = $request->all();
        $result->name = $data['name'];
       
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('brandss.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $bran = Brands::find($id);
        return view('admin.brand.edit',['bran'=> $bran]);
    }
    public function destroy($id)
    {
        $bran=Brands::find($id);
        $bran->delete();

        return redirect()->route('brandss.index')
            ->with('success','Deleted successfully');
    }
}