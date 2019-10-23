<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use DB;
class ProductController extends Controller
{
    //
    public function index()
    {
        // $user = $users::query()->where->('id',1)->paginate(16);
        // $user = $users::where->('id',1)->paginate(16);
        $mould=Product::query()->where('isproduct',1)->paginate(16);
        // $user=User::query()->where('id',1)->paginate(16);
        $product=Product::query()->where('isproduct',0)->paginate(16);
        // $user= DB::table('users')->paginata(16);
        $a=[$mould,$product];
        return $a;

    }
    public function show($id){
        $product=Product::query()->where('id',$id)->get();
        return  $product;
    }
    public function syindex()
    {
        // $user = $users::query()->where->('id',1)->paginate(16);
        // $user = $users::where->('id',1)->paginate(16);
        $mould=Product::query()->where('isproduct',1)->take(5)->get();
        // $user=User::query()->where('id',1)->paginate(16);
        $product=Product::query()->where('isproduct',0)->take(5)->get();
        // $user= DB::table('users')->paginata(16);
        $a=[$mould,$product];
        return $a;

    }

}
