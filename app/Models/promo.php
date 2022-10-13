<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','promocode','message','startdate',	'enddate',	'no_of_user',	'minimum_order_amount',	'discount',	'discounttype',	'maximum_discount_amount',	'repeatusage',	'no_of_repeatusage','updated_at','created_at'	
        
    ];
}
