<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newoffer extends Model
{
    use HasFactory;
    protected $fillable =[

        'id','category','subcategory','image','updated_at','created_at'	

	

    ];
}
