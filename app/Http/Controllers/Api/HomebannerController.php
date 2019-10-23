<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Homebanner;
class   HomebannerController extends Controller
{
    //
    public function index(){
        $banner=Homebanner::query()->get();
        return $banner;
    }

}
