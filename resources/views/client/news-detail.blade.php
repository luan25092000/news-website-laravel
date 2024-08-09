@extends('client.layouts.template')

@section('title')
    {{ $news->title }}
@endsection

@section('css')
    <link href="{{ asset('client/css/comment.css') }}" rel="stylesheet" type="text/css"/>
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

<!-- Start comment-sec Area -->
<section class="comment-sec-area pt-80 pb-80">
    <div class="container">
        <div class="row flex-column">
            <h5 class="text-uppercase pb-80">{{ $commentQty + $replyQty }} Comments</h5>
            <br />
            @foreach ($comments as $comment)
                <div class="comment comment-container">
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" width="50px">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">{{ $comment->getUser->name }}</a></h5>
                                    <p class="date">
                                        {{ $comment->created_at }}
                                    </p>
                                    <p class="comment">
                                        {{ $comment->content }}
                                    </p>
                                    @if (Auth::check())
                                        <a class="text-primary reply" style="cursor: pointer;" data-comment-id="{{ $comment->id }}" data-user-id="{{ Auth::user()->id }}">Reply</a>
                                        @if (Auth::user()->id == $comment->user_id)
                                            <a class="text-danger" style="cursor: pointer;" href="{{ route('client.delete.comment', [$comment->id]) }}">Delete</a>
                                        @endif
                                    @endif
                                    <div class="row flex-row d-flex reply-form"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach (\App\Models\Reply::where('comment_id', $comment->id)->get() as $reply)
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" width="50px">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{ $reply->getUser->name }}</a></h5>
                                        <p class="date">
                                            {{ $reply->created_at }}
                                        </p>
                                        <p class="comment">
                                            {{ $reply->content }}
                                        </p>
                                        @if (Auth::check())
                                            <a class="text-primary reply-to-reply" style="cursor: pointer;" data-comment-id="{{ $comment->id }}" data-user-id="{{ Auth::user()->id }}">Reply</a>
                                            @if (Auth::user()->id == $reply->user_id)
                                                <a class="text-danger" style="cursor: pointer;" href="{{ route('client.delete.reply', [$reply->id]) }}">Delete</a>
                                            @endif
                                        @endif
                                        <div class="row flex-row d-flex reply-to-reply-form"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End comment-sec Area -->

@if (Auth::check())
    <!-- Start commentform Area -->
    <section class="commentform-area pb-120 pt-80 mb-100">
        <div class="container">
            <h5 class="text-uppercas pb-50">Leave a Comment</h5>
            <div class="row flex-row d-flex">
                <div class="col-lg-12">
                    <form action="{{ route('client.create.comment', [$news->id]) }}" method="POST">
                        @csrf
                        <textarea
                        class="form-control mb-10"
                        name="content"
                        cols="5"
                        rows="4"
                        placeholder="Content"
                        onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Content'"
                        required=""
                        ></textarea>
                        <button type="submit" class="btn btn-warning text-white mt-20">Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End commentform Area -->
@else
    <div class="container">
        <a href="{{ route('client.login.form') }}" class="btn btn-warning text-white">Please login to comment</a>
    </div>
@endif
@endsection

@section('js')
    <script>
        var createReplyRoute = "{{ route('client.create.reply') }}";
        var csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('client/js/comment.js') }}"></script>
@endsection
