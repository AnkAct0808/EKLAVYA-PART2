<?php

namespace App\Http\Controllers;
use App\Models\Subcat;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubcatController extends Controller
{
    public function index()
    {
        $subcat= DB::table('subcats')
        ->leftjoin("products", "products.id", "=", "subcats.categoryid")
        ->select('products.id as categoryid', 'products.name as ankita', 'subcats.*')
        ->get();
        // echo "<pre>";
        // print_r($subcat);
        // die;
        return view('admin.Subcategory.index',compact('subcat'));
    }


    public function create()      //dropdown method
    {
        $subcat = Product::all();
        
        return view('admin.Subcategory.add',compact('subcat'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryid' => 'required',
            'subcategory' => 'required',
            'subtitle' => 'required',
            'image'=>'required'
        ]);
        $data = $request->all();
        $result = new Subcat;
        $result->categoryid = $data['categoryid'];
        $result->subcategory = $data['subcategory'];
        $result->subtitle = $data['subtitle'];
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('assets/uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
     $result->save();

        return redirect()->route('childcategory.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        
        $subcat=Subcat::get();
        return view('admin.Subcategory.index',compact('subcat'));
    }



    public function update($id,Request $request)
    
    {
        $result = Subcat::find($id);
        $data = $request->all();
        $result->categoryid = $data['categoryid'];
        $result->subcategory = $data['subcategory'];
       $result->subtitle = $data['subtitle'];
    if ($request->hasfile('image')) {

      $file = $request->file('image');

      $extension = $file->getClientOriginalExtension();

      $filename = time() . '.' . $extension;

      $file->move('assets/uploads/image/', $filename);

      $result->image = $filename;

    }

     $result->save();

        return redirect()->route('childcategory.index')
            ->with('success','Updated successfully');
    }

    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules()
    // {
    //     $request->validate [(
        
    //       'image' => 'required|image',
    //        )];    
    // }

 

    public function edit($id)
    {
        $subcat = Subcat::find($id);
        $cat = Product::all();
        return view('admin.Subcategory.edit',['subcat'=> $subcat, 'cat'=>$cat]);
    }
    public function destroy($id)
    {
        $subcat=Subcat::find($id);
        $subcat->delete();

        return redirect()->route('childcategory.index')
            ->with('success','Deleted successfully');
    }
}
