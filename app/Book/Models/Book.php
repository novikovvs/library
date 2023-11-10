<?php

namespace App\Book\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'owner_id'
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date'
    ];

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
