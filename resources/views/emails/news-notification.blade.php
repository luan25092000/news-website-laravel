<head>
    <style>
        p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    @php
        $imageUrl = public_path($news['image']);
    @endphp
    <p>You have the new news</p>
    <p>
        <img src="{{ $message->embed($imageUrl) }}" width="150">
    </p>
    <p>Title: {{ $news['title'] }}</p>
    <p>Date: {{ \Carbon\Carbon::parse($news['created_at'])->format('M d, Y') }}</p>
    <p>
        Please click <a href="{{ route('client.news.detail', [$news['id']]) }}" target="_blank">here</a> to see the news
    </p>
</body>