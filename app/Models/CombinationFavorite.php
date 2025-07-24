<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class CombinationFavorite extends Model
{
    public $timestamps  = true;
    protected $fillable = ['user_id', 'combination_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function combination(): BelongsTo
    {
        return $this->belongsTo(Combination::class);
    }
}
