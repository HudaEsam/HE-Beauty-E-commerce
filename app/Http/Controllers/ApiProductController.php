<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiProductController;

class ApiProductController extends Controller
{
    public function all(){
        $products=Product::all();
        if($products==null){
            return response()->json([
                "msg"=>"Products not found"
            ],404);
        }
        return ProductResource::collection($products);
    }
    public function show($id){
        $product=Product::find($id);
        if($product==null){
            return response()->json([
                "msg"=>"Product not found"
            ],404);
        }
        return new ProductResource($product);
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            "category_id"=>"required|exists:categories,id",
            // "category"=>"required|string|max:255",
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "quantity"=>"required|integer",
            "image"=>"image|mimes:png,jpg,jpeg",
        ]);
        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors()
            ],301);
        }
        $imageName=Storage::putFile("Product",$request->image);
        Product::create([
            "category_id"=>$request->category_id,
            "category_name"=>$request->category,
            "product_id"=>$request->id,
            "name"=>$request->name,
            "desc"=>$request->desc,
            "price"=>$request->price,
            "quantity"=>$request->quantity,
            "image"=>$imageName,
        ]);
        return response()->json([
            "msg"=>"Product added successuflly"
        ],201);

    }
    public function update($id,Request $request){
        $validator=Validator::make($request->all(),[
            "category_id"=>"required|exists:categories,id",
            // "category"=>"required|string|max:255",
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "quantity"=>"required|integer",
            "image"=>"image|mimes:png,jpg,jpeg",
        ]);
        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors()
            ],301);
        }
        $product=Product::find($id);
        if($product==null){
            return response()->json([
                "msg"=>"Product not found"
            ],404);
        }
        $imageName=$product->image;
        if($request->has("image")){
            Storage::delete($imageName);
            $imageName=Storage::putFile("Product",$request->image);
        }

        $product->update([
            "category_id"=>$request->category_id,
            "name"=>$request->name,
            "desc"=>$request->desc,
            "price"=>$request->price,
            "quantity"=>$request->quantity,
            "image"=>$imageName,
        ]);
        return response()->json([
            "msg"=>"Product updated successuflly",
            "product"=>new ProductResource($product)
 
        ],201);
    }
    public function delete($id){
        $product=Product::find($id);
        if($product==null){
        return response()->json([
            "msg"=>"Product not found"
        ],404);
    }
    if($product->image !==null){
        Storage::delete($product->image);
    }
    $product->delete();
    return response()->json([
        "success"=>"Product deleted successuflly"

    ],200);

}
}
