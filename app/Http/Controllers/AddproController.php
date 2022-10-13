<?php

namespace App\Http\Controllers;
use App\Models\addprod;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AddproController extends Controller
{
    public function index()
    {
        $add= DB::table('addprods')->get();
        return view('admin.addproduct.index',compact('add'));
    }


    public function create()
    {
        return view('admin.addproduct.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $data = $request->all();
        $result = new addprod;
        $result->name = $data['name'];
       $result->category = $data['category'];
       $result->brand = $data['brand'];
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('assets/uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
         $result->save();
    
            return redirect()->route('addpro.index')
                ->with('success','Created successfully.');
        }
    
        public function show()
        {
            //
            $add=addprod::get();
            return view('admin.addproduct.index',compact('add'));
        }
    
    
    
        public function update($id,Request $request)
        {
            $result = addprod::find($id);
            $data = $request->all();
            $result->name = $data['name'];
            $result->category = $data['category'];
            $result->brand = $data['brand'];
          
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('assets/uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
         $result->save();
    
            return redirect()->route('addpro.index')
                ->with('success','Updated successfully');
        }
    
        public function edit($id)
        {
            $add = addprod::find($id);
            return view('admin.addproduct.edit',['add'=> $add]);
        }
        public function destroy($id)
        {
            $add=addprod::find($id);
            $add->delete();
    
            return redirect()->route('addpro.index')
                ->with('success','Deleted successfully');
        }
    }