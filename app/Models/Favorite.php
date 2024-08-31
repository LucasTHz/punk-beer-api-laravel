<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory, SoftDeletes;

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
        'fav_alcohol' => 'integer',
    ];

    /**
     * Get the user that owns the Favorite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
