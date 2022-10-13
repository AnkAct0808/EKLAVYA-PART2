<?php

namespace App\Http\Controllers;
use App\Models\ordertwo;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ordertwoController extends Controller


{
    public function index()
    {
        $buy= DB::table('ordertwos')->get();
        return view('admin.Ordertwo.index',compact('buy'));
    }


    public function create()
    {
        // return view('admin.Ordertwo.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderid' => 'required',
            'name' => 'required',
            'number' => 'required',
           'subtotal' => 'required',
            'dcharge' => 'required',
            'total' => 'required',
            'paymentmethod' => 'required',
            'status' => 'required',
            'activestatus' => 'required',
            'orderdate' => 'required',
        ]);
        $result = ordertwo::find($id);
                $data = $request->all();
                $result->orderid = $data['orderid'];
           $result->name = $data['name'];
           $result->number = $data['number'];
          $result->subtotal = $data['subtotal'];
          $result->dcharge = $data['dcharge'];
          $result->total= $data['total'];
           $result->paymentmethod = $data['paymentmethod'];
            $result->status = $data['status'];
            $result->activestatus = $data['activestatus'];
             $result->orderdate = $data['orderdate'];
     
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('assets/uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
         $result->save();
    
            return redirect()->route('buyitem.index')
                ->with('success','Created successfully.');
        }
    
        public function show()
        {
            
            $buy=ordertwo::get();
            return view('admin.Ordertwo.index',compact('buy'));
        }
    
    
    
        public function update($id,Request $request)
        {
            $result = ordertwo::find($id);
                    $data = $request->all();
                     $result->orderid = $data['orderid'];
               $result->name = $data['name'];
               $result->number = $data['number'];
               $result->subtotal = $data['subtotal'];
               $result->dcharge = $data['dcharge'];
               $result->total= $data['total'];
                $result->paymentmethod = $data['paymentmethod'];
                $result->status = $data['status'];
                $result->activestatus = $data['activestatus'];
                $result->orderdate = $data['orderdate'];
          
        if ($request->hasfile('image')) {
    
          $file = $request->file('image');
    
          $extension = $file->getClientOriginalExtension();
    
          $filename = time() . '.' . $extension;
    
          $file->move('assets/uploads/image/', $filename);
    
          $result->image = $filename;
    
        }
    
         $result->save();
    
            return redirect()->route('buyitem.index')
                ->with('success','Updated successfully');
        }
    
        public function edit($id)
        {
            $buy = ordertwo::find($id);
            return view('admin.Ordertwo.edit',['buy'=> $buy]);
        }
        public function destroy($id)
        {
            $buy=buy::find($id);
            $buy->delete();
    
            return redirect()->route('buyitem.index')
                ->with('success','Deleted successfully');
        }
    }