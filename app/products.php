<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
  
    protected $table = "products"; // khai báo tên table
    public $timestamp = false;
    protected $fillable = [
        'id_type', 'id_url', 'name', 'detail', ' price', 'price_promotion', ' image', 'status', 'new'
    ];
 
    public function bill_detail()
    {
       return $this->hasMany('App\bill_detail', 'id_product', 'id');// quan hệ giữa bảng products với bill_detail
    }
    public function type(){
        return $this->belongsTo('App\products', 'id_type', 'id');
    }
}
