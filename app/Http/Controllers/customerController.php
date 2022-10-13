<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        $cus= DB::table('customers')->get();
        return view('admin.customer.index',compact('cus'));
    }


    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'emailid' => 'required',
            'state' => 'required',
            'city' => 'required',
            
        ]);
    $data = $request->all();
    $result = new customer;
    $result->name = $data['name'];
    $result->number = $data['number'];
    $result->emailid = $data['emailid'];
    $result->state = $data['state'];
    $result->city = $data['city'];
  
 
    {

    //   $file = $request->file('image');

    //   $extension = $file->getClientOriginalExtension();

    //   $filename = time() . '.' . $extension;

    //   $file->move('uploads/image/', $filename);

    //   $result->image = $filename;

    }

     $result->save();

        return redirect()->route('custom.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        
        $cus=customer::get();
        return view('admin.customer.index',compact('cus'));
    }



    public function update($id,Request $request)
    {
        $result = customer::find($id);
        $data = $request->all();
        $result->name = $data['name'];
         $result->number = $data['number'];
        $result->emailid = $data['emailid'];
        $result->state = $data['state'];
        $result->city = $data['city'];
    {

    //   $file = $request->file('image');

    //   $extension = $file->getClientOriginalExtension();

    //   $filename = time() . '.' . $extension;

    //   $file->move('uploads/image/', $filename);

    //   $result->image = $filename;

    }

     $result->save();

        return redirect()->route('custom.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $cus = customer::find($id);
        return view('admin.customer.edit',['cus'=> $cus]);
    }
    public function destroy($id)
    {
        $cus=customer::find($id);
        $cus->delete();

        return redirect()->route('custom.index')
            ->with('success','Deleted successfully');
    }
}