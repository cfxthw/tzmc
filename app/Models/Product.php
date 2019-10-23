<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $timestamps = true;
    protected $fillable = [
        'product_name_zh','product_name_,en','product_name_de','product_content_zh','product_content_en','product_content_de', 'product_image','isproduct'
    ];
      public function getProduct_imageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['product_image'], ['http://', 'https://'])) {
            return $this->attributes['product_image'];
        }
        return  \Storage::disk('public')->url($this->attributes['product_image']);
    }

}
