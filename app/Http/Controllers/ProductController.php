<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $comanies=Product::all();
        //dd($comanies);
        return view('product',['models'=>$comanies]);
    }
    public function createproduct()
    {
        $users=User::all();
        return view('createproduct',['users'=>$users]);
    }
}
