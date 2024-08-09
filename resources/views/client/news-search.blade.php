@extends('client.layouts.template')

@section('title')
    Search by '{{ $request->keyword }}'
@endsection

@section('main')
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Search by '{{ $request->keyword }}'</div>
                </div>
                @foreach ($newsSearch as $news)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="{{ $news->image }}" alt="{{ $news->title }}"/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="{{ route('client.news.detail', [$news->id]) }}" class="fh5co_magna py-2"> {{ $news->title }} </a> <a href="#" class="fh5co_mini_time py-3"></a>
                            <br>
                            {{ $news->getAuthor->name }} - {{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                @foreach ($newsPopular as $item)
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font">
                                <a href="{{ route('client.news.detail', [$item->id]) }}">{{ $item->title }}</a>
                            </div>
                            <div class="most_fh5co_treding_font_123">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                {{ $newsSearch->links() }}
             </div>
        </div>
    </div>
</div>
@endsection
