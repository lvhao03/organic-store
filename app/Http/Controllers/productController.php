<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\productModel;
use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class productController extends Controller
{
    function index(){
        return view('frontend.index', ['productList' =>  Product::all() ]);
    }

    function shop(){
        return view('frontend.shop', [
            'productList' =>  Product::all(),
            'categoryList' => Category::all(),
            'saleProductList' => Product::whereNotNull('sale')->with('category')->get()
        ]);
    }

    function orderBy($orderBy){
        $productList = Product::orderBy('price', $orderBy)->get();
        return response()->json($productList);
    }


    function detail($id){
        return view('frontend.shop-details', ['product' => Product::find($id)]);
    }

    function addToCart(Request $request, $id = 0, $quantity = 1){
        if ($request->session()->exists('cart') == false) {           
            $request->session()->push('cart', ['id'=> $id,  'quantity'=> $quantity]);
            return view('frontend.shoping-cart');
        } 
        $cart =  $request->session()->get('cart'); 
        $index = array_search($id, array_column($cart, 'id'));
        if ($index != ''){
            $cart[$index]['quantity'] += $quantity;
            $request->session()->put('cart', $cart);
        } else { 
            $cart[]= ['id'=> $id, 'quantity'=> $quantity];
            $request->session()->put('cart', $cart);
        }    
        return view('frontend.shoping-cart');
    }
    
    function cart(){
        return view('frontend.shoping-cart');
    }

    function deleteCart(Request $request, $id=0){
        $cart =  $request->session()->get('cart'); 
        $index = array_search($id, array_column($cart, 'id'));
        if ($index != ''){ 
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return view('frontend.shoping-cart');
    }

    function deleteAllCart(Request $request){
        $request->session()->forget('cart');
        return view('frontend.shoping-cart');
    }

    function adminIndex(){
        return view('admin.product.list', ['productList' => Product::with('category')->get()]);
    }

    function add(){
        $categoryList = DB::table('category')->get();
        return view('admin.product.add', [
            'categoryList' => $categoryList]);
    }

    function add_(Request $request){
        Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'stock_quantity' => $request['stock_quantity'],
        ]);
        return view('admin.product.list', ['productList' => Product::with('category')->get()]);
    }

    function edit($id){
        return view('admin.product.edit', [
            'product' =>  Product::find($id) ,
            'categoryList' => Category::all()
        ]);
    }

    function edit_(Request $request){
        $product = Product::find($request['id']);
        $product->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'stock_quantity' => $request['stock_quantity'],
        ]);
        return view('admin.product.list', ['productList' =>  Product::with('category')->get()]);
    }

    function delete($id){
        Product::destroy($id);
        return view('admin.product.list', ['productList' =>  Product::with('category')->get()]);
    }
}
