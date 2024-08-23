<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewsNotification;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->get();

        return view('admin.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.news.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check have the image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imgName = $request->image->getClientOriginalName();
            // Store image
            $request->image->storeAs('/public/images/news', $imgName);
            $news = News::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'image' => '/storage/images/news/' . $imgName,
                'admin_id' => Auth::guard('admin')->user()->id
            ]);
            $this->sendNewsNotification($news->toArray());

            return redirect()->route('ad.news.index')->with('success', 'Add news successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('admin.news.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $news = News::find($id);

        return view('admin.news.edit', compact('categories', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $dataUpdate = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
        ];
        // Check have the new image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imgName = $request->image->getClientOriginalName();
            // Store image
            $request->image->storeAs('/public/images/news', $imgName);
            $dataUpdate['image'] = '/storage/images/news/' . $imgName; // you will add image to data update
        }
        $news->update($dataUpdate);

        return redirect()->route('ad.news.index')->with('success', 'Update news successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('ad.news.index')->with('success', 'Delete news successful');
    }

    public function sendNewsNotification($news)
    {
        $users = User::pluck('email')->toArray();
        Log::info('Email users: ' . json_encode($users));
        Log::info('News: ' . json_encode($news));
        Log::info('Image url: ' . public_path($news['image']));
        Mail::to($users)->send(new SendNewsNotification($news));
    }
}
