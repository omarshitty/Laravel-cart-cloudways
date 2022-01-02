<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class CartController extends Controller
{
    public function cart(){
        //var_dump(session('cartItems'));

        //dd(session('cartItems'));
        return view('cart.cart');
    }

    public function AddToCart($id){

        $product = Product::findOrFail($id);
        $cartItem = session()->get('cartItems', []);

        if(isset($cartItem[$id])){
            $cartItem[$id]['quantity']++;
        }else{
            $cartItem[$id]=[
                'image_path' => $product->image_path,
                'name' => $product->name,
                'brand' => $product->brands,
                'detials' => $product->detials,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cartItems',$cartItem);
        return redirect()->back()->with('sucsses', 'Product add to cart');
    }

    public function delete(Request $request){
        if($request->id){
            $cartItem = session()->get('cartItems');

            if(isset($cartItem[$request->id])){
                unset($cartItem[$request->id]);
                session()->put('cartItems', $cartItem);
            }
            return Redirect()->back()->with('success', 'item has been deleted successfly');
        }
    }

    public function updateQuantity(Request $request){
        if($request->id && $request->quantity){
           $cartItem = session()->get('cartItems');
           if (isset($cartItem[$request->id])) {
               $cartItem[$request->id]['quantity'] = $request->quantity;
               session()->put('cartItems', $cartItem);
           }
            return Redirect()->back()->with('success', 'quantity has been update successfly');
        }
    }
}
