<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "category_id"=>$this->category_id,
            "category_name"=>$this->category,
            "product_id"=>$this->id,
            "name"=>$this->name,
            "desc"=>$this->desc,
            "price"=>$this->price,
            "quantity"=>$this->quantity,
            "image"=>asset("storage")."/".$this->image,


        ];
    }
}
