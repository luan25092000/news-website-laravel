@extends('client.layouts.template')

@section('title')
    {{ $news->title }}
@endsection

@section('main')
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <img src="{{ $news->image }}" class="mb-3" width="100%">
                {!! $news->content !!}
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
    </div>
</div>
@endsection
