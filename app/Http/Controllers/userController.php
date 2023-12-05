<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    function index(){
        return view('admin.user.list', ['userList' => User::all()]);
    }

    function add(){
        return view('admin.user.add');
    }

    function add_(Request $request){
        User::create([
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'role' => $request['role']
        ]);
        return view('admin.user.list', ['userList' => User::all()]);
    }

    function edit($id){
        return view('admin.user.edit', ['user' => User::find($id)]);
    }

    function edit_(Request $request){
        $user = User::find($request['id']);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role']
        ]);
        return view('admin.user.list', ['userList' => User::all()]);
    }

    function delete($id){
        User::destroy($id);
        return view('admin.user.list', ['userList' => User::all()]);
    }
}
