<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bulvarController extends Controller
{
    public function index()
    {
        $bp= DB::table('bulks')->get();
        return view('admin.bulkproduct.index',compact('bp'));
    }


    public function create()
    {
        return view('admin.bulkproduct.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $data = $request->all();
        $result = new Bulk;
        $result->name = $data['name'];
       $result->category = $data['category'];
     
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
         $result->save();
    
            return redirect()->route('bulk.index')
                ->with('success','Created successfully.');
        }
    
        public function show()
        {
            //
            $bp=Bulk::get();
            return view('admin.bulkproduct.index',compact('bp'));
        }
    
    
    
        public function update($id,Request $request)
        {
            $result = Bulk::find($id);
            $data = $request->all();
            $result->name = $data['name'];
            $result->category = $data['category'];
          
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
         $result->save();
    
            return redirect()->route('bulk.index')
                ->with('success','Updated successfully');
        }
    
        public function edit($id)
        {
            $bp = Bulk::find($id);
            return view('admin.bulkproduct.edit',['bp'=> $bp]);
        }
        public function destroy($id)
        {
            $bp=Bulk::find($id);
            $bp->delete();
    
            return redirect()->route('bulk.index')
                ->with('success','Deleted successfully');
        }
    }