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
        $newsPopular = News::where('category_id', $news->category_id)->orderBy('created_at', 'DESC')->get()->except($id);

        return view('client.news-detail', compact('news', 'newsPopular'));
    }

    public function showNewsByCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $newsCategories = News::where('category_id', $categoryId)->orderBy('created_at', 'DESC')->paginate(10);
        $newsIds = News::where('category_id', $categoryId)->pluck('id')->toArray();
        $newsPopular = News::whereNotIn('id', $newsIds)->orderBy('created_at', 'DESC')->get();

        return view('client.news-category', compact('category', 'newsCategories', 'newsPopular'));
    }
}
