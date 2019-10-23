<?php

namespace App\Http\Resources;

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
           'product_content'=>$this->product_content,
           'product_image'=>$this->product_image,
           'product_name'=>$this->product_name,
           'isproduct'=>$this->isproduct,
       ];
    }
}
