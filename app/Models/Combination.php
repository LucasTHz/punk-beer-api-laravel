<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Combination extends Model
{
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'description',
        'ulid',
        'name',
        'tag_line',
        'alcohol',
        'amargor',
        'food',
        'tips',
        'img_url',
    ];

    protected $casts = [
        'alcohol'   => 'integer',
    ];

    /**
     * Get the columns that should receive a unique identifier.
     */
    public function uniqueIds(): array
    {
        return ['ulid'];
    }

    public function getRouteKeyName(): string
    {
        return 'ulid';
    }

    /**
     * Get the user that owns the Combination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
