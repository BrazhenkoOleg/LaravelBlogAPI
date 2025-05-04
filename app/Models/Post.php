<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'content',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeWithComments($query, string $text)
    {
        return $query->whereHas('comments', fn ($q) => $q->where('content', 'like', "%$text%"))
                    ->with(['comments' => fn ($q) => $q->where('content', 'like', "%$text%")]);
    }
}
