<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class CombinationFavorite extends Model
{
    public $timestamps  = true;
    protected $fillable = ['user_id', 'combination_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function combination()
    {
        return $this->belongsTo(Combination::class);
    }
}
