<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fav_description',
        'fav_name',
        'fav_tag_line',
        'fav_alcohol',
        'fav_amargor',
        'fav_food',
        'fav_tips',
        'fav_img_url',
        'fav_date_beer',
    ];

    protected $casts = [
        'fav_date_beer' => 'datetime',

    ];
}
