<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        //dd($users);
        return view('index',['users'=>$users]);
    }
    public function user(int $id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/')->with('delete',"Ma'lumot muvafaqiyatli o'chirildi");
    }
    public function detail(int $id)
    {
        $users=User::find($id);
        //dd($models);
        return view('detailuser',['models'=>$users]);
    }
    public function create()
    {
        return view('create');
    }
    public function createuser(UserRequest $request)
    {
        //dd($request);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect('/')->with('success',"Ma'lumot muvaqiyatli qo'shildi");
    }
}
