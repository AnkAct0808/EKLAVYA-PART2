<?php

namespace App\Http\Controllers;
use App\Models\newoffer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewofferController extends Controller


{
    public function index()
    {
        $new= DB::table('newoffers')->get();
         return view('admin.newofferimage.index',compact('new'));
    }


    public function create()
    {
        return view('admin.newofferimage.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
           'subcategory' => 'required',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
    $data = $request->all();
    $result = new newoffer;
    $result->category = $data['category'];
    $result->subcategory = $data['subcategory'];
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('news.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        
         $new=newoffer::get();
         return view('admin.newofferimage.index',compact('new'));
    }



    public function update($id,Request $request)
    {
        $result = newoffer::find($id);
        $data = $request->all();
        $result->category = $data['category'];
        $result->subcategory = $data['subcategory'];
       
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('news.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $new = newoffer::find($id);
        return view('admin.newofferimage.edit',['new'=> $new]);
    }
    public function destroy($id)
    {
        $new=newoffer::find($id);
        $new->delete();

        return redirect()->route('news.index')
            ->with('success','Deleted successfully');
    }
}