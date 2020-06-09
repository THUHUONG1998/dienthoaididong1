<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    protected $table = "bill_detail";
    public $timestamp = false;
    protected $fillable = [
        'id_bill', 'id_product', 'quantity', ' price', 'discount_price',
    ];
    public function products(){
        return $this->belongsTo('App\products', 'id_product', 'id');
    }
}
