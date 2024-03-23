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
        'fav_alcool',
        'fav_amargor',
        'fav_comidas',
        'fav_dicas',
        'fav_img_url',
        'fav_data_cerveja',
    ];

    protected $casts = [
        'fav_data_cerveja' => 'datetime',

    ];
}
