<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HighLands Coffee - Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
        <!-- Banner -->
        <div class="banner">
            <img src="{{ asset('images/banner1.jpg') }}" alt="Banner">
        </div>

        <div class="content-wrapper">
            <!-- Quán mới -->
            <div class="store-section">
                <img src="{{ asset('images/highlands.jpg') }}" alt="Quán Mới" class="store-image">
                
                @foreach ($locations as $index => $location)
                    <div class="store-info" data-index="{{ $index }}">
                        <h2>{{ $location->name }}</h2>
                        <p>{{ $location->address }}</p>
                        <a href="{{ $location->google_map_link }}" target="_blank">TÌM ĐƯỜNG &rarr;</a>
                    </div>
                @endforeach
            </div>
            
        
            <!-- Tin mới nhất -->
            <div class="news-section">
                <h2 class="news-title">TIN MỚI NHẤT</h2>
                <a href="{{ route('news.index') }}" class="btn btn-secondary">Xem tất cả --></a>
                <div class="news-list">
                    @foreach($latestPosts as $post)
                        <div class="news-item">
                            <a href="{{ route('news.show', $post->id) }}">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="news-image">
                            </a>
                            <div class="news-content">
                                <h5>
                                    <a href="{{ route('news.show', $post->id) }}">{{ Str::limit($post->title, 40) }}</a>
                                </h5>
                                <p>{{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const storeInfos = document.querySelectorAll(".store-info");
    let currentIndex = 0;

    function showNextInfo() {
        // Ẩn tất cả các địa chỉ
        storeInfos.forEach(info => {
            info.classList.remove("active");
            info.style.display = "none";
        });

        // Hiện địa chỉ hiện tại
        storeInfos[currentIndex].classList.add("active");
        storeInfos[currentIndex].style.display = "block";

        // Chuyển sang địa chỉ tiếp theo
        currentIndex = (currentIndex + 1) % storeInfos.length;

        // Lặp lại sau 3 giây
        setTimeout(showNextInfo, 3000);
    }

    // Kiểm tra nếu có địa chỉ nào thì bắt đầu hiển thị luân phiên
    if (storeInfos.length > 0) {
        showNextInfo();
    }
});
</script>

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
