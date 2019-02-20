<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reviews(){
        //Product can have so many reviews
        return $this->hasMany(Review::class);
    }
}
