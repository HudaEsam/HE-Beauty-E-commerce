<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $products=Product::all();
        return view("Admin.all",compact("products"));

    }
    public function show($id){
        $product=Product::findOrFail($id);
        return view("Admin.show",compact("product"));

    }
    public function create(){
        $categories=Category::all();
        return view("Admin.create",compact("categories"));
    }
    public function store(Request $request){
        $data=$request->validate([
            "category_id"=>"required|exists:categories,id",
            // "category"=>"required|string|max:255",

            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "quantity"=>"required|integer",
            "image"=>"required|image|mimes:png,jpg,jpeg",
        ]);
        $data['image']=Storage::putFile("products",$data['image']);
        Product::create($data);
        return redirect(url("products/create"))->with("success","data inserted successfully");

    }
    public function edit($id){
        $product=Product::findOrFail($id);
        $categories=Category::all();

        return view("Admin.edit",compact("product","categories"));
    }
    public function updata(Request $request,$id){
        $data=$request->validate([
            "category_id"=>"required|exists:categories,id",
            // "category"=>"required|string|max:255",
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "quantity"=>"required|integer",
            "image"=>"image|mimes:png,jpg,jpeg",
        ]);

        $catId =  $request->category_id;
            // Category::findOrFail()
        $product=Product::findOrFail($id);
        if($request->has("image")){
            Storage::delete($product->image);
            $data['image']=Storage::putFile("products",$data['image']);

        }
        $product->update($data);
        return redirect(url("products/show/$id"))->with("success","Product updatated successfully");

    }
    public function delete($id){
        $product=Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        $product=Product::all();
        return redirect(url('products/all'))->with("success","product deleted successfully");
    }

}
