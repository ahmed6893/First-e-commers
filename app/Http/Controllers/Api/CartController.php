<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = $request->all();

        $cart = session()->get('cart',[]);

        $cartItemId = $data['product_id'].'.'.$data['color'].'.'.$data['size'];

        if (isset($cart[$cartItemId])){
            $cart[$cartItemId]['qty'] += $data['qty'];
        }
        else{
            $cart[$cartItemId] = [
                'product_id' => $data['product_id'],
                'name'=> $data['name'],
                'price'=>$data['price'],
                'qty'=>  $data['qty'],
                'color'=>$data['color'],
                'size'=> $data['size'],
                'image'=>$data['image'],
            ];
        }

        session()->put('cart',$cart);

        return response()->json([
           'message'=>'Product added to cart successfully',
            'cart_count'=>count($cart),
        ]);
    }

    public function index()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });

        return response()->json([
            'cart_items' => array_values($cart), 
            'total' => number_format($total, 2),
            'count' => count($cart),
        ]);
    }
}
