<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Review extends Model
{
    public function product(){
        //Reviews Belongs To Product
        return $this->belongsTo(Product::class);
    }
}
