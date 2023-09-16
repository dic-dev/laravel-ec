<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Facades\Filter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        [
            $keyword_arr,
            $category_id,
            $price_arr,
            $sort_arr
        ] = Filter::format($request->query());

        $products = Product::where('category_id', 'like', $category_id)
            ->where(function ($q) use ($keyword_arr) {
                foreach ($keyword_arr as $keyword) {
                    $q->where(function ($Q) use ($keyword) {
                        $Q->where('name', 'like', $keyword);
                        $Q->orWhere('detail', 'like', $keyword);
                    });
                }
            })
            ->where(function ($q) use ($price_arr) {
                foreach ($price_arr as $value) {
                    $q->where('price', $value[0], $value[1]);
                }
            })
            ->orderBy($sort_arr[0], $sort_arr[1])
            ->paginate(20);
        /* $products = Product::paginate(20); */
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
