<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function showNewsDetail($id)
    {
        $news = News::find($id);

        return view('client.news-detail', compact('news'));
    }

    public function showNewsByCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $newsCategories = News::where('category_id', $categoryId)->orderBy('created_at', 'DESC')->get();

        return view('client.news-category', compact('category', 'newsCategories'));
    }
}
