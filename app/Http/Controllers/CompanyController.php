<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function company()
    {
        $comanies=Company::all();
        //dd($comanies);
        return view('company',['models'=>$comanies]);
    }
    public function delete(int $id)
    {
        $company=Company::find($id);
        $company->delete();
        return redirect('/company')->with('delete',"Ma'lumot muvafaqiyatli o'chirildi");
    }
    public function create()
    {
        $user=User::all();
        //dd($user);
        return view('createcompany',['users'=>$user]);
    }
    public function detail(int $id)
    {
        $comanies=Company::find($id);
        //dd($users);
        return view('detailcompany',['models'=>$comanies]);
    }
    public function createcompany(CompanyRequest $request)
    {
        //dd($request);
        $company=new Company();
        $company->name=$request->name;
        $company->user_id=$request->user_id;
        $company->save();
        return redirect('/company')->with('success',"Ma'lumot muvaqiyatli qo'shildi");
    }
}

