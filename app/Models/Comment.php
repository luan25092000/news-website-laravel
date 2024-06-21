<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'news_id',
        'content'
    ];

    // one to one, user_id is the foreign_key
    public function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // one to one, news_id is the foreign_key
    public function getNews() {
        return $this->belongsTo(News::class, 'news_id');
    }
}
