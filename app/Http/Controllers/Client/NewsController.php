<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function showNewsDetail($id)
    {
        $news = News::find($id);
        $newsPopular = News::where('category_id', $news->category_id)->orderBy('created_at', 'DESC')->get()->except($id);
        $commentQty = Comment::where('news_id', $id)->count();
        $replyQty = Reply::whereIn('comment_id', Comment::where('news_id', $id)->pluck('id')->toArray())->count();
        $comments = Comment::where('news_id', $id)->get();

        return view('client.news-detail', compact('news', 'newsPopular', 'commentQty', 'replyQty', 'comments'));
    }

    public function showNewsByCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $newsCategories = News::where('category_id', $categoryId)->orderBy('created_at', 'DESC')->paginate(10);
        $newsIds = News::where('category_id', $categoryId)->pluck('id')->toArray();
        $newsPopular = News::whereNotIn('id', $newsIds)->orderBy('created_at', 'DESC')->get();

        return view('client.news-category', compact('category', 'newsCategories', 'newsPopular'));
    }

    public function searchNews(Request $request)
    {
        $newsSearch = News::where('title', 'like', '%' . $request->keyword . '%')->paginate(10);
        $newsPopular = News::orderBy('created_at', 'DESC')->get();

        return view('client.news-search', compact('newsSearch', 'newsPopular', 'request'));
    }

    public function createComment($newsId, Request $request)
    {
        Comment::create([
            'user_id' => Auth::user()->id,
            'news_id' => $newsId,
            'content' => $request->content
        ]);

        return redirect()->back();
    }

    public function createReply(Request $request)
    {
        Reply::create([
            'user_id' => $request->userId,
            'comment_id' => $request->commentId,
            'content' => $request->content
        ]);

        return redirect()->back();
    }
    
    public function deleteComment($commentId)
    {
        Comment::find($commentId)->delete();

        return redirect()->back();
    }

    public function deleteReply($replyId)
    {
        Reply::find($replyId)->delete();

        return redirect()->back();
    }
}
