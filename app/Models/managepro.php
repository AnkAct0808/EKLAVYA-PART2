<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class managepro extends Model
{
    use HasFactory;
    protected $fillable =[

        'id','productname','categoryname','subcategory','measurment','stock','availability','image','discription','updated_at','created_at'	

	

    ];
}
