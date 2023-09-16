<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductRequest $request)
    {
        $keyword = !is_null($request->query('keyword')) ? $request->query('keyword') : '';
        $category_id = !is_null($request->query('category_id')) ? $request->query('category_id') : '';
        $min_price = !is_null($request->query('min_price')) ? $request->query('min_price') : '';
        $max_price = !is_null($request->query('max_price')) ? $request->query('max_price') : '';
        $sort = !is_null($request->query('sort')) ? $request->query('sort') : '';
        $params = [$keyword, $category_id, $min_price, $max_price, $sort];

        $product = new Product;
        $products = $product->filter($params);
        $data = ['products' => $products];

        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $data = ['product' => $product];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'maker' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->save();

        return redirect(route('admin.index.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = ['product' => $product];
        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
