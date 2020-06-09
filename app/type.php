<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $table = "categories"; // khai báo tên table
    protected $fillable = [
        'name', 'icon', 'status',
    ];
    public $timestamp = false;
    public function products(){
        return $this->hasMany('App\products', 'id_type', 'id');
    }
}
