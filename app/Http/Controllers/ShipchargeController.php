<?php

namespace App\Http\Controllers;
use App\Models\shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShipchargeController extends Controller
{
    public function index()
    {
        $ship= DB::table('shippings')->get();
        return view('admin.shippcharge.index',compact('ship'));
    }


    public function create()
    {
        return view('admin.shippcharge.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shippingcharge' => 'required',
            'description' => 'required',
           
        ]);
    $data = $request->all();
    $result = new shipping;
    $result->shippingcharge = $data['shippingcharge'];
    $result->description = $data['description'];
  {

    //   $file = $request->file('image');

    //   $extension = $file->getClientOriginalExtension();

    //   $filename = time() . '.' . $extension;

    //   $file->move('uploads/image/', $filename);

    //   $result->image = $filename;

    }

     $result->save();

        return redirect()->route('ships.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        //
        $ship=shipping::get();
        return view('admin.shippcharge.index',compact('ship'));
    }



    public function update($id,Request $request)
    {
        $result = shipping::find($id);
        $data = $request->all();
        $result->shippingcharge = $data['shippingcharge'];
        $result->description = $data['description'];
       
  {

    //   $file = $request->file('image');

    //   $extension = $file->getClientOriginalExtension();

    //   $filename = time() . '.' . $extension;

    //   $file->move('uploads/image/', $filename);

    //   $result->image = $filename;

    }

     $result->save();

        return redirect()->route('ships.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $ship = shipping::find($id);
        return view('admin.shippcharge.edit',['ship'=> $ship]);
    }
    public function destroy($id)
    {
        $ship=shipping::find($id);
        $ship->delete();

        return redirect()->route('ships.index')
            ->with('success','Deleted successfully');
    }
}