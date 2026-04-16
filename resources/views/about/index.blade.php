<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu</title>
    <link rel="stylesheet" href="{{asset('css/about/about.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
        @foreach($aboutSections as $index => $about)
            <div class="about-section row {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
                </div>
                <div class="col-md-6 about-content">
                    <h2 class="about-title">{{ $about->title }}</h2>
                    <p>{{ Str::limit($about->content, 150, '...') }}</p>
                    <a href="{{ route('about.detail', ['id' => $about->id]) }}" class="about-btn">XEM CHI TIẾT</a>
                </div>
            </div>
        @endforeach
    </div>
</body>
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
</html>
