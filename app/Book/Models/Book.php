<?php

namespace App\Book\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Book\Models\Book
 *
 * @property int $id
 * @property string $name
 * @property string $author
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int|null $owner_id
 * @property-read \app\Models\User|null $owner
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'owner_id',
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
