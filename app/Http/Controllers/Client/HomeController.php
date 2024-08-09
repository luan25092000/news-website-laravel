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
        if ($latestNews) {
            $newsAfterLatest = News::where('id', '<>', $latestNews->id)->orderBy('created_at', 'DESC')->get();
        } else {
            $newsAfterLatest = [];
        }
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('client.home', compact('latestNews', 'newsAfterLatest', 'categories'));
    }
}
