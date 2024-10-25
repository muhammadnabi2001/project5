<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Postrequest;
use App\Http\Requests\ProductRequest;
use App\Models\Company;
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
        $companies=Company::all();
        return view('createproduct',['users'=>$users,'companies'=>$companies]);
    }
    public function addproduct(ProductRequest $request)
    {
        $product= new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->user_id = $request->user_id;
        $product->company_id = $request->company_id;
        if($request->hasFile('img'))
        {
            $file=$request->file('img');
            $extention=$file->getClientOriginalExtension();
            $filename=date("Y-m-d").'_'. time().'.'. $extention;

          $photo_name =  $file->move('img_uploaded/',$filename);
        }
        $product->img=$photo_name;

        // dd($photo_name);

        $product->save();
        return redirect('/product')->with('success',"Ma'lumot muvvafaqiyatli qo'shildi");
    }
    public function detail(int $id)
    {
        $products=Product::find($id);
        //dd($models);
        return view('detailproduct',['models'=>$products]);
    }

}
