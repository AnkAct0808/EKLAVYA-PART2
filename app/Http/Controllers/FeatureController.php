<?php

namespace App\Http\Controllers;
use App\Models\Feature;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $fee= DB::table('features')->get();
        return view('admin.features.index',compact('fee'));
    }


    public function create()
    {
        return view('admin.features.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'stage' => 'required',
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            
           
        ]);
    $data = $request->all();
    $result = new Feature;
    $result->product = $data['product'];
   $result->stage = $data['stage'];
 
   $result->title = $data['title'];
   $result->description = $data['description'];
   if ($request->hasfile('image')){

       $file = $request->file('image');

       $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('fees.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        //
        $fee=Feature::get();
        return view('admin.features.index',compact('fee'));
    }



    public function update($id,Request $request)
    {
        $result = Feature::find($id);
        $data = $request->all();
        $result->product = $data['product'];
        $result->stage = $data['stage'];
       
        $result->title = $data['title'];
        $result->description = $data['description'];
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('fees.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $fee =Feature::find($id);
        return view('admin.features.edit',['fee'=> $fee]);
    }
    public function destroy($id)
    {
    
        $fee=Feature::find($id);
        $fee->delete();

        return redirect()->route('fees.index')
         ->with('success','Deleted successfully');
    }
}
