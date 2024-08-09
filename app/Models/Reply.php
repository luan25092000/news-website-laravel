<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $fillable = [
        'comment_id',
        'user_id',
        'content'
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
