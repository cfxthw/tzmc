<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\News;
class   NewController extends Controller
{
    //
    public function newindex(News $news){
        $new=News::query()->orderBy('time','desc')->paginate(13);
        $industry=News::query()->where('iscompanynews',1)->orderBy('time','desc')->paginate(13);
        $enterprise=News::query()->where('iscompanynews',0)->orderBy('time','desc')->paginate(13);
        $a=[$new,$industry,$enterprise];
        return $a;
    }
    public function synewindex(News $news){
        $industry=News::query()->where('iscompanynews',1)->orderBy('time','desc')->take(6)->get();
        $enterprise=News::query()->where('iscompanynews',0)->orderBy('time','desc')->take(6)->get();
        $c=[$industry,$enterprise];
        return $c;
    }
    public function newshow($id){
        $new=News::query()->where('id',$id)->get();
        $news=News::query()->orderBy('time','desc')->take(5)->get();
        $a=[$new,$news];
        return $a;
    }

}
