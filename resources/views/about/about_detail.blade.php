<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $about->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/about/details.css')}}">
</head>
<body class="font-sans antialiased bg-gray-100">
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
    <!-- Ảnh tiêu đề -->
    <div class="relative">
        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-white text-5xl font-bold">{{ $about->title }}</h1>
        </div>
    </div>

    <!-- Nội dung -->
    <div class="container mx-auto flex flex-col lg:flex-row gap-10 py-10 px-5">
        <!-- Cột bên trái: Nội dung chính -->
        <div class="lg:w-2/3 bg-white p-8 shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $about->title }}</h2>
            <p class="text-lg text-gray-700 leading-relaxed">{{ $about->content }}</p>
        </div>

        <!-- Cột bên phải: Danh sách các mục khác -->
        <div class="lg:w-1/3">
            <h2 class="text-2xl font-bold mb-4">Các mục khác</h2>
            <div class="space-y-4">
                @foreach ($otherAbouts as $other)
                    <a href="{{ route('about.detail', $other->id) }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-xl transition">
                        <div class="relative w-full h-32">
                            <img src="{{ asset('storage/' . $other->image) }}" alt="{{ $other->title }}" class="w-full h-full object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                <h3 class="text-white font-semibold text-lg text-center">{{ $other->title }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
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
