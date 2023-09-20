<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'postal_code',
        'pref_id',
        'city',
        'address1',
        'address2',
        'tel'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function formatParams($params)
    {
        [
            $id,
            $keyword,
            $sort
        ] = $params;

        $str = '%' . preg_replace('/　|\s+/', '% %', $keyword) . '%';
        $keyword_arr = preg_split('/[\s]/', $str, -1, PREG_SPLIT_NO_EMPTY);

        if ($sort !== '') {
            $sort_arr = ($sort === 'price_asc' | $sort === 'price_desc')
                ? explode('_', $sort)
                : ['created_at', 'asc'];
        } else {
            $sort_arr = ['created_at', 'asc'];
        }

        return [$id, $keyword_arr, $sort_arr];
    }

    public function filter($params)
    {
        [
            $id,
            $keyword_arr,
            $sort_arr
        ] = $this->formatParams($params);

        $users = User::where(function ($q) use ($id) {
            if ($id !== '') {
                $q->where('id', $id);
            }
        })
            ->where(function ($q) use ($keyword_arr) {
                foreach ($keyword_arr as $keyword) {
                    $q->where(function ($Q) use ($keyword) {
                        $Q->where('name', 'like', $keyword);
                        $Q->orWhere('email', 'like', $keyword);
                    });
                }
            })
            ->orderBy($sort_arr[0], $sort_arr[1])
            ->paginate(20);

        return $users;
    }
}
