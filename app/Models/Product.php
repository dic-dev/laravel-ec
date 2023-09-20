<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'maker_id', 'name', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }

    public static function formatParams($params)
    {
        [
            $keyword,
            $category_id,
            $min_price,
            $max_price,
            $sort
        ] = $params;

        $str = '%' . preg_replace('/　|\s+/', '% %', $keyword) . '%';
        $keyword_arr = preg_split('/[\s]/', $str, -1, PREG_SPLIT_NO_EMPTY);

        $min_price = $min_price !== '' ? $min_price : '0';

        if ($sort !== '') {
            $sort_arr = ($sort === 'price_asc' | $sort === 'price_desc')
                ? explode('_', $sort)
                : ['created_at', 'asc'];
        } else {
            $sort_arr = ['created_at', 'asc'];
        }

        return [$keyword_arr, $category_id, $min_price, $max_price, $sort_arr];
    }

    public function filter($params)
    {
        [
            $keyword_arr,
            $category_id,
            $min_price,
            $max_price,
            $sort_arr
        ] = $this->formatParams($params);

        $products = Product::where(function ($q) use ($category_id) {
            if ($category_id !== '') {
                $q->where('category_id', '=', $category_id);
            }
        })
            ->where(function ($q) use ($keyword_arr) {
                foreach ($keyword_arr as $keyword) {
                    $q->where(function ($Q) use ($keyword) {
                        $Q->where('name', 'like', $keyword);
                        $Q->orWhere('detail', 'like', $keyword);
                    });
                }
            })
            ->where('price', '>=', $min_price)
            ->where(function ($q) use ($max_price) {
                if ($max_price !== '') {
                    $q->where('price', '<=', $max_price);
                }
            })
            ->orderBy($sort_arr[0], $sort_arr[1])
            ->paginate(20);

        return $products;
    }
}
