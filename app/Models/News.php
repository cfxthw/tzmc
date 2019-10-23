<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $timestamps = true;
    protected $fillable = [
        'titleen','titlezh', 'titlede','contenten','contentzh','contentde', 'time'
    ];

}
