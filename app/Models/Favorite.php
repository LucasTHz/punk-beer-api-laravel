<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Favorite extends Model
{
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    protected $primaryKey = 'id';

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
    ];

    protected $casts = [
        'fav_alcohol'   => 'integer',
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
