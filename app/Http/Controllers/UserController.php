<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){
        return view("User.home");
    }
    public function shop(){
        $products=Product::all();
        return view("User.shop",compact("products"));
    }
    public function oneProduct($id){
        $product=Product::findOrFail($id);
        return view("User.oneProduct",compact("product"));
    }
    public function search(Request $request){
        $key=$request->key;
        $products=Product::where("name","like","%$key%")->get();
        return view("User.shop",compact("products"));

        }
        public function addToMyCart(){
            return view("User.myCart");
        }
   public function addToCart($id , Request $request)
   {
     $product =  Product::findOrFail($id);
     $numQuantity = $request->numQuantity;
     if(! $product)
     {
        abort(404);
     }
     $cart = session()->get("cart");
     
     if(! $cart)
     {
       $cart = [
        $id => [
            "name"=>$product->name,
            "numQuantity"=>$numQuantity,
            "price"=>$product->price,
            "image"=>$product->image,
        ]
       ];
       session()->put("cart",$cart);
    //    dd(session()->get("cart"));
       return redirect()->back()->with("success","product addedd to cart successfuly");
     }else {
        if(isset($cart[$id])) {
            $oldqty = $cart[$id]["numQuantity"];
            // dd($oldqty);
            // dd(($oldqty));
            $newQty = $oldqty + $numQuantity;
                    $cart[$id]['numQuantity'] = $newQty ;
                    session()->put('cart', $cart);
                    // dd(session()->get("cart"));
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
         }else{
             $cart[$id] = [
                 "name"=>$product->name,
                 "numQuantity"=>$numQuantity,
                 "price"=>$product->price,
                 "image"=>$product->image,
                ];
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
                // dd(session()->get("cart"));
            }
     }


   }

   public function myCart()
   {
    $products  = session()->get("cart");
    $user = Auth::user();
    // dd($products);
    return view("User.myCart")->with("products",$products)->with("user",$user);
   }
   public function makeOrder(Request $request)
   {
    
    $day = $request->day;
    if(empty($day)){
        return redirect()->back()->with('success', 'Please select day!');
    }
    else{
        $user_id = Auth::user()->id;
        $products  = session()->get("cart");
        $order =   Order::create([
        "requiredDate"=>$day,
        // "orderDate"=>$day,
        "user_id"=>$user_id
    ]);
    
    // if (Auth::user()->role=="user") {
    
    // dd($products[1]);
    foreach($products as $id=>$product){
        // dd($id , $data);
        OrderDetails::create([
            "order_id"=>$order->id,
            "product_id"=>$id,
            // "quantity"=>$product['numQuantity'],
            "price"=>$product['price'],
            "numQuantity" => $product['numQuantity'],
        ]);
    // }
    return redirect(url(""))->with('success', ' successfully!');

   }
}
//  else {
//     return redirect(url(""))->with('success', ' wrong!');
//     }

    

}
public function showCategory( $category){
    $products = Product::where('category', $category)->get();
   
    return view('User.showCategory',['products'=>$products]);
    

}
// public function face($id){
//     $category=Category::findOrFail($id);
//     return view("User.category",compact("category"));
// }

// public function favProducts()
// {
//  $products  = session()->get("fav");
//  $user = Auth::user();
//  // dd($products);
//  return view("User.favProducts")->with("products",$products)->with("user",$user);
// }
}