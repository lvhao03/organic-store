<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function index(){
        return view('admin.category.list', ['categoryList' =>  Category::all()]);
    }

    function add(){
        return view('admin.category.add');
    }

    function add_(Request $request){
        Category::create([
            'name' => $request['name']
        ]);
        return view('admin.category.list', ['categoryList' =>  Category::all()]);
    }
    
    function edit($id){
        return view('admin.category.edit', ['category' =>  Category::find($id)]);
    }

    function edit_(Request $request){
        $category = Category::find($request['id']);
        $category->name = $request['name'];
        $category->save();
        return view('admin.category.list', ['categoryList' =>  Category::all()]);
    }

    function delete($id){
        Category::destroy($id);
        return view('admin.category.list', ['categoryList' =>  Category::all()]);
    }
}
