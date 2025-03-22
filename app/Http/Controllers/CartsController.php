<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;



class CartsController
{
    public $product;
    public function index()
    {

        return view('website.cart.index',
        [
            'products'=>Cart::content()
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->product = Product::find($request->id);
        Cart::add([
            'id'       => $request->id,
            'name'     => $this->product->name,
            'qty'      => $request->qty,
            'price'    => $this->product->selling_price ,
            'weight'   => 550,
            'options'  =>
                [
                'size'  => $request->size,
                'color' => $request->color,
                'image' => $this->product->image,
                'code'  => $this->product->code,
            ]]);
        return redirect('/cart');

    }

    public function update(Request $request,string $id)

    {

        Cart::update($id, ['qty' => $request->qty]);
        return redirect('/cart');

    }

    public function destroy(string $id)

    {

        Cart::remove($id);
        return redirect('/cart');

    }

}
