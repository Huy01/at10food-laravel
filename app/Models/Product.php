<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "t_foods";

    public function product_type(){
        return $this->belongsTo('App\Models\TypeProduct', 'id_type', 'id');
    }
}
