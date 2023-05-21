<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'user_id',
        'post_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User');
    }
    
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'Post');
    }
}
