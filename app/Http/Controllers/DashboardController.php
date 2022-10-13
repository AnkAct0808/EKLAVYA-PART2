<?php

namespace App\Http\Controllers;
use App\Models\categories;
use App\Models\ordertwo;
 use App\Models\Contact;
 use App\Models\product;
 use App\Models\Subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
         $categoriescount = categories::count();
         $Productcount = product::count();
         $ordertwocount = ordertwo::count();
         $Subcategorycount = Subcat::count();
        return view('admin.dashboard',compact('categoriescount','ordertwocount','Productcount','Subcategorycount'));
    }



}