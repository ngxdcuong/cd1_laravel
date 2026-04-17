<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - Three Coffee</title>
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
    
    <div class="container mt-4">
        <h2 class="fw-bold">TIN TỨC</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <a href="{{ route('news.show', $post->id) }}">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 220px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('news.show', $post->id) }}" class="text-dark fw-bold">{{ Str::limit($post->title, 60) }}</a>
                            </h5>
                            <p class="text-muted">
                                <i class="bi bi-calendar-event"></i> 
                                {{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y, H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
