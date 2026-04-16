<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài viết</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/show_news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">

</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{ asset('images/OIP.jpg') }}" alt="Highlands Coffee">
        </a>
    
        <ul class="nav-menu">
            <li><a href="{{route('news.index')}}">Tin tức</a></li>
            <li><a href="{{ route('about.index') }}">Về chúng tôi</a></li>
            <li><a href="{{ route('recruitments.index') }}">Tuyển dụng</a></li>
            <li><a href="{{route('login')}}">Quản lý</a></li>
        </ul>
    </nav>
            <div class="container">
<!-- Hiển thị bài viết hiện tại -->
<article class="news-detail">
    <h1 class="fw-bold">{{ $post->title }}</h1>
    <p class="text-muted">
        📅 {{ \Carbon\Carbon::parse($post->created_at)->format('l, d/m/Y, H:i') }}
    </p>
    <a href="{{ route('news.show', $post->id) }}">
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
    </a>
    <div class="news-content">
        {!! $post->content !!}
    </div>
</article>

<!-- Nút quay lại -->
<a href="{{ route('news.index') }}" class="btn btn-primary">Quay lại</a>

        
            <!-- Hiển thị danh sách "CÁC TIN KHÁC" -->
<div class="related-news mt-5">
    <h2 class="fw-bold">CÁC TIN KHÁC</h2>
    <ul>
        @foreach($relatedPosts as $relatedPost)
            <li>
                <a href="{{ route('news.show', $relatedPost->id) }}">
                    {{ $relatedPost->title }}
                </a> 
                <span class="text-muted">
                    ({{ \Carbon\Carbon::parse($relatedPost->created_at)->format('d/m/Y, H:i') }})
                </span>
            </li>
        @endforeach
    </ul>
</div>

<footer class="footer">
    <div class="footer-container">
        <!-- Social Media -->
        <div class="footer-social">
            <a href="https://www.facebook.com/highlandscoffeevietnam"><img src="{{ asset('images/icons8-facebook-50.png') }}" alt="Facebook"></a>
            <a href="https://www.youtube.com/channel/UCHEqa2uTf8uXrGWrnU3ThgA"><img src="{{ asset('images/icons8-youtube-50.png') }}" alt="YouTube"></a>
            <a href="https://www.instagram.com/explore/locations/72785801/highlands-coffee/"><img src="{{ asset('images/icons8-instagram-50.png') }}" alt="Instagram"></a>
        </div>

        <!-- Copyright -->
        <p class="footer-copyright">© 2025 HighLands Coffee. All rights reserved.</p>

        <!-- Newsletter & Contact -->
        <div class="footer-contact">
            <span>✉ customerservice@highlands-coffee.com</span>
        </div>
    </div>
</footer>
</body>
</html>

