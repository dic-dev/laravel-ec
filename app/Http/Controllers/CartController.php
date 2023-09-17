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

        $data = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        $old_num = !is_null($data) ? $data->num : 0;
        $new_num = $old_num + $num;

        Cart::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            ['num' => $new_num]
        );

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
        $data = ['carts' => $carts];

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

        if ($request->has('update') & $num !== 0) {
            Cart::updateOrCreate(
                ['id' => $id],
                ['num' => $num]
            );
        } else {
            $id = $request->id;
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

        return view('carts.show');
    }

    /**
     * Remove the specified resources from storage.
     */
    public function delete(Request $request)
    {
        $user_id = $request->user()->id;
        Cart::where('user_id', $user_id)
            ->delete();

        return redirect()->route('carts.show');
    }
}
