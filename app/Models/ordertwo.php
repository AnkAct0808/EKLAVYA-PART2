<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordertwo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','orderid','name','number','subtotal','dcharge','total','paymentmethod','status','activestatus','orderdate'

        
    ];
}
