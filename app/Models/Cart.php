<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'num'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sumPrice(string $user_id)
    {
        $data = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();
        $sum_price = 0;

        if ($data->isNotEmpty()) {
            foreach ($data as $value) {
                $price = $value->product->price;
                $num = $value->num;
                $sum_price = $sum_price + $price * $num;
            }
        }

        return $sum_price;
    }

    public function addItem($user_id, $product_id, $num)
    {
        $data = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        $old_num = !is_null($data) ? $data->num : 0;
        $new_num = $old_num + $num;

        Cart::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            ['num' => $new_num]
        );
    }

    public function updateNum($id, $num)
    {
        if ($num !== 0) {
            Cart::where('id', $id)
                ->update(['num' => $num]);
        } else {
            $id = $request->id;
            Cart::destroy($id);
        }
    }
}
