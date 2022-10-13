<?php

namespace App\Http\Controllers;
use App\Models\promo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $pro= DB::table('promos')->get();
        return view('admin.promocode.index',compact('pro'));
    }

    
    public function create()
    {
        return view('admin.promocode.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'promocode' => 'required',
            'message' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'no of users' => 'required',
            'minimum order Amount' => 'required',
            'discount' => 'required',
            'Discount Type' => 'required',
            'Maximum Discount Amount' => 'required',
            'Repeat Usage' => 'required',
            'No of repeat usage' => 'required',
            
        ]);
    $data = $request->all();
    $result = new promo;
    $result->promocode = $data['promocode'];
    $result->message = $data['message'];
    $result->startdate = $data['startdate'];
    $result->enddate = $data['enddate'];
    $result->noofusers = $data['noofusers'];
    $result->minimumorderamount = $data['minimumorderamount'];
    $result->discount = $data['discount'];
    $result->discounttype = $data['discounttype'];
    $result->maximumdiscountamount = $data['maximumdiscountamount'];
    $result->Repeatusage = $data['Repeatusage'];
    $result->Noofrepeatusage = $data['Noofrepeatusage'];
 
     {

    //   $file = $request->file('image');

    //   $extension = $file->getClientOriginalExtension();

    //   $filename = time() . '.' . $extension;

    //   $file->move('uploads/image/', $filename);

    //   $result->image = $filename;

    }

     $result->save();

        return redirect()->route('prom.index')
            ->with('success','Created successfully.');
    }

    public function show()
    {
        //
        $pro=promo::get();
        return view('admin.promocode.index',compact('pro'));
    }



    public function update($id,Request $request)
    {
        $result = promo::find($id);
        $data = $request->all();
        $result->promocode = $data['promocode'];
        $result->message = $data['message'];
        $result->startdate = $data['startdate'];
        $result->enddate = $data['enddate'];
        $result->noofusers = $data['noofusers'];
        $result->minimumorderamount = $data['minimumorderamount'];
        $result->discount = $data['discount'];
        $result->discounttype = $data['discounttype'];
        $result->maximumdiscountamount = $data['maximumdiscountamount'];
        $result->Repeatusage = $data['Repeatusage'];
        $result->Noofrepeatusage = $data['Noofrepeatusage'];
       
  {

    //   $file = $request->file('image');

    //   $extension = $file->getClientOriginalExtension();

    //   $filename = time() . '.' . $extension;

    //   $file->move('uploads/image/', $filename);

    //   $result->image = $filename;

    }

     $result->save();

        return redirect()->route('prom.index')
            ->with('success','Updated successfully');
    }

    public function edit($id)
    {
        $pro = promo::find($id);
        return view('admin.promocode.edit',['pro'=> $pro]);
    }
    public function destroy($id)
    {
        $pro=promo::find($id);
        $pro->delete();

        return redirect()->route('prom.index')
            ->with('success','Deleted successfully');
    }
}