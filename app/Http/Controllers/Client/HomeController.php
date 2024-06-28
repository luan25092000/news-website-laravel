<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $latestNews = News::latest()->first();
        $newsAfterLatest = News::where('id', '<>', $latestNews->id)->orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('client.home', compact('latestNews', 'newsAfterLatest', 'categories'));
    }
}
