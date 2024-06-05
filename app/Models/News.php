<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'image',
        'admin_id',
        'category_id',
        'content'
    ];

    // one to one, admin_id is the foreign_key
    public function getAuthor() {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // one to one, category_id is the foreign_key
    public function getCategory() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
