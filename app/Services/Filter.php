<?php

namespace App\Services;

use App\Models\Product;
/**
 * Filter Services
 */

class Filter
{
    public function test($params)
    {

    }

    public function format($params)
    {
        $keywords = isset($params['keyword']) ? $params['keyword'] : '';
        $str = '%' . preg_replace('/　|\s+/', '% %', $keywords) . '%';
        $keyword_arr = preg_split('/[\s]/', $str, -1, PREG_SPLIT_NO_EMPTY);

        $category_id = isset($params['category_id']) ? $params['category_id'] : '%';

        $min_price = isset($params['min_price']) ? $params['min_price'] : '0';
        $max_price = isset($params['max_price']) ? $params['max_price'] : '';
        $price_arr = [];
        if ($max_price === '') {
            array_push($price_arr, ['>=', $min_price]);
        } else {
            array_push($price_arr, ['>=', $min_price]);
            array_push($price_arr, ['<=', $max_price]);
        }

        if (isset($params['sort'])) {
            $sort_arr = ($params['sort'] === 'price_asc' | $params['sort'] === 'price_desc')
                ? explode('_', $params['sort'])
                : ['created_at', 'asc'];
        } else {
            $sort_arr = ['created_at', 'asc'];
        }

        return [$keyword_arr, $category_id, $price_arr, $sort_arr];
    }
}

