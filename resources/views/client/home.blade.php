@extends('client.layouts.template')

@section('title', 'Homepage')

@section('main')
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            @if ($latestNews)
                <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height"><img src="{{ $latestNews->image }}" alt="{{ $latestNews->title }}" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font">
                            <div class=""><a class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($latestNews->created_at)->format('M d, Y') }} </a></div>
                            <div class=""><a href="{{ route('client.news.detail', [$latestNews->id]) }}"
                                    class="fh5co_good_font"> {{ $latestNews->title }} </a></div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-6">
                <div class="row">
                    @foreach ($newsAfterLatest as $news)
                        <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                            <div class="fh5co_suceefh5co_height_2"><img src="{{ $news->image }}"
                                    alt="{{ $news->title }}" />
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><a class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                                            {{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }} </a></div>
                                    <div class=""><a href="{{ route('client.news.detail', [$news->id]) }}"
                                            class="fh5co_good_font_2" style="font-size: 14px;"> {{ $news->title }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        @foreach ($categories as $category)
            <div class="container animate-box" data-animate-effect="fadeIn">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                        {{ $category->name }}
                        <a class="float-right" href="{{ route('client.news.category', [$category->id]) }}"
                            style="font-size: 16px;">See all</a>
                    </div>
                </div>
                <div class="row">
                    @foreach (\App\Models\News::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get() as $news)
                        <div class="col-md-3 item px-2">
                            <div class="fh5co_latest_trading_img_position_relative">
                                <div class="fh5co_latest_trading_img"><img src="{{ $news->image }}"
                                        alt="{{ $news->title }}" class="fh5co_img_special_relative" /></div>
                                <div class="fh5co_latest_trading_img_position_absolute"></div>
                                <div class="fh5co_latest_trading_img_position_absolute_1">
                                    <a href="{{ route('client.news.detail', [$news->id]) }}" class="text-white">
                                        {{ $news->title }} </a>
                                    <div class="fh5co_latest_trading_date_and_name_color"> {{ $news->getAuthor->name }} -
                                        {{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
