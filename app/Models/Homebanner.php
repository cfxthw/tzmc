<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Homebanner extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $timestamps = true;
    protected $fillable = [
        'banner',
    ];
      public function getbannerUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['banner'], ['http://', 'https://'])) {
            return $this->attributes['banner'];
        }
        return  \Storage::disk('public')->url($this->attributes['banner']);
    }

}
