<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addprod extends Model
{
    use HasFactory;
    protected $fillable =[

        'id','name','category','brand','updated_at','created_at'	

	

    ];
}
