<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    function get_product(){
        return DB::table('product')
        ->join('category', 'product.category_id', 'category.id')
        ->select('product.id', 'product.name as product_name', 'product.price', 'category.name', 'description', 'image_url', 'stock_quantity', 'category.name as category_name')
        ->get();
    }

    function get_product_byID($id){
        return DB::table('product')
        ->where('product.id', '=', $id)
        ->join('category', 'product.category_id', 'category.id')
        ->select('category.name as category_name', 'product.id', 'product.name', 'product.price', 'description', 'image_url', 'stock_quantity' , 'product.category_id')
        ->first();
    }

    function add_product($id, $name, $price, $category_id, $description, $stock_quantity){
        DB::table('product')->insert([
            'name' => $name,
            'price' =>  $price,
            'category_id' => $category_id,
            'description' => $description,
            'stock_quantity' => $stock_quantity
        ]);
    }

    function edit_product($id, $name, $price, $category_id, $description, $stock_quantity){
        DB::table('product')->where('id', '=', $id)->update([
            'name' => $name,
            'price' =>  $price,
            'category_id' => $category_id,
            'description' => $description,
            'stock_quantity' => $stock_quantity
        ]);
    }

    function delete_product($id){
        DB::table('product')->where('id', '=', $_GET['id'])->delete();
    }

    function get_latest_product(){
        DB::table('product')->orderBy('id', 'desc')->take(5)->get();
    }
}
