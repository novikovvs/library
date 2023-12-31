<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Book\Models\Book.
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int|null $owner_id
 * @property \app\Models\User|null $owner
 * @property \app\Models\Author|null $author
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
 * @property int|null $author_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthorId($value)
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Author> $authors
 * @property int|null $authors_count
 *
 * @mixin \Eloquent
 */
class Book extends Model
{
    protected $fillable = [
        'name',
        'author_id',
        'owner_id',
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_to_books', 'book_id');
    }
}
