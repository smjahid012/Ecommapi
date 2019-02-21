<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' =>$this->detail,
            'price' => $this->price,
            //Stock Logic
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' =>$this->discount,
            //Total Price Logic
            //Total Price Will Be Minus of Discount Price
            'totalPrice' => round((1 - ($this->discount/100)) * $this->price,2),
            //Rating Logic
            //If reviews count 0 then it will Undefined.Return Error
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Rating Yet Given',
            //Reviews Href 
            'href' => route('reviews.index', $this->id)

        ];
    }
}
