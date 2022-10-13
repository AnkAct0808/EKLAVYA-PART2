<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','categoryname','subcategory','subtitle','image','updated_at','created_at'	];
}
