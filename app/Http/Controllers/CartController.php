<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $product_id = $request->product_id;
        $num = $request->num;

        $cart = new Cart();
        $cart->addItem($user_id, $product_id, $num);

        return redirect()->route('carts.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user_id = $request->user()->id;
        $carts = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        $cart = new Cart();
        $sum_price = $cart->sumPrice($user_id);

        $data = [
            'carts' => $carts,
            'sum_price' => $sum_price
        ];

        return view('carts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $num = $request->num;

        if ($num !== 0) {
            Cart::where('id', $id)
                ->update(['num' => $num]);
        } else {
            Cart::destroy($id);
        }

        return redirect()->route('carts.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Cart::destroy($id);

        return redirect()->route('carts.show');
    }

    /**
     * Remove the specified resources from storage.
     */
    public function delete(Request $request)
    {
        logger('aaaaa');
        $user_id = $request->user()->id;
        Cart::where('user_id', $user_id)
            ->delete();

        return redirect()->route('carts.show');
    }
}
