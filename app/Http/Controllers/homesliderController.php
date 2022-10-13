<?php

namespace App\Http\Controllers;
use App\Models\homeslider;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class homesliderController extends Controller
{
    public function index()
    {
        $home= DB::table('homesliders')
        ->leftjoin("products", "products.id", "=", "homesliders.category")
        ->select('products.id as category', 'products.name as ankita', 'homesliders.*')
        ->get();
        return view('admin.homslider.index',compact('home'));
    }


    public function create()

    {
        $home = Product::all();
        return view('admin.homslider.add',compact('home'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
           
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
           
            
        ]);
    $data = $request->all();
    $result = new homeslider;
   
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

        return redirect()->route('hom.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        //
        $home=homeslider::get();
        return view('admin.homslider.index',compact('home'));
    }



    public function update($id,Request $request)
    {
        $result = homeslider::find($id);
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

        return redirect()->route('hom.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $home = homeslider::find($id);
        return view('admin.homslider.edit',['home'=> $home]);
    }
    public function destroy($id)
    {
        $home=homeslider::find($id);
        $home->delete();

        return redirect()->route('hom.index')
            ->with('success','Deleted successfully');
    }
    // public function updateStatus(Request $request)
    // {
    //     $home = homeslider::find($request->id); 
    //     $home->status = $request->status; 
    //     $home->save(); 
    //     return response()->json(['success'=>'Status change successfully.']); 
    // }
}