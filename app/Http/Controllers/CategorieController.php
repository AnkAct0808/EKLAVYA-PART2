<?php //product controller

namespace App\Http\Controllers;
use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categaries= DB::table('categories')->get();
        return view('admin.product.index',compact('categaries'));
    }


    public function create()
    {
        return view('admin.product.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'productcategory' => 'required',
            'productsubcategory' => 'required',
            'productimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
    $data = $request->all();
    $result = new categories;
    $result->productname = $data['productname'];
   $result->productcategory = $data['productcategory'];
   $result->productsubcategory = $data['productsubcategory'];
    if ($request->hasfile('productimage')) {

      $file = $request->file('productimage');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->productimage = $filename;

    }

     $result->save();

        return redirect()->route('cat.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        //
        $categaries=categories::get();
        return view('admin.product.index',compact('categaries'));
    }



    public function update($id,Request $request)
    {
        $result = categories::find($id);
        $data = $request->all();
        $result->productname = $data['productname'];
        $result->productcategory = $data['productcategory'];
        $result->productsubcategory = $data['productsubcategory'];
    if ($request->hasfile('productimage')) {

      $file = $request->file('productimage');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->productimage = $filename;

    }

     $result->save();

        return redirect()->route('cat.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $categaries = categories::find($id);
        return view('admin.product.edit',['categaries'=> $categaries]);
    }
    public function destroy($id)
    {
        $Categarie=categories::find($id);
        $Categarie->delete();

        return redirect()->route('cat.index')
            ->with('success','Deleted successfully');
    }
}