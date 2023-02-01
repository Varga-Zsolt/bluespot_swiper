<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    const LIKE_ACTION = 'like';
    const DISLIKE_ACTION = 'dislike';

    const ALLOWED_ACTIONS = [
        self::LIKE_ACTION,
        self::DISLIKE_ACTION
    ];

    protected $fillable = [
        'user_id',
        'swiped_user_id',
        'action'
    ];

    public function isLiked(): bool
    {
        return $this->action === self::LIKE_ACTION;
    }
}
