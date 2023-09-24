<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Auth;

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

        $product = new Product();
        $products = $product->filter($params);
        $data = ['products' => $products];

        if ($request->is('admin/*')) {
            return view('admin.products.index', $data);
        }

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $data = ['product' => $product];

        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'maker_id' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->maker_id = $request->maker_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->save();

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        $data = ['product' => $product];

        if ($request->is('admin/*')) {
            return view('admin.products.show', $data);
        }

        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = ['product' => $product];

        if (Auth::guard('admin')->check()) {
            return view('admin.products.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $id = $product->id;
        $name = $request->name;
        $category_id = $request->category_id;
        $maker_id = $request->maker_id;
        $price = $request->price;
        $detail = $request->detail;

        Product::where('id', $id)
            ->update([
                'name' => $name,
                'category_id' => $category_id,
                'maker_id' => $maker_id,
                'price' => $price,
                'detail' => $detail
            ]);

        $product = Product::find($id);
        $data = ['product' => $product];

        return redirect()->route('admin.products.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $id = $product->id;
        Product::destroy($id);

        return redirect()->route('admin.products.index');
    }
}
