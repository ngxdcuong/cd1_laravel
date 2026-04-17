<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tuyển dụng nhân sự</title>
    <link rel="stylesheet" href="{{asset('css/recruitments/recruitments.css')}}">
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

    
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Ứng tuyển</h2>
        <form action="{{ route('recruitments.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Họ tên:</label>
                <input type="text" name="full_name" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700">Số điện thoại:</label>
                <input type="text" name="phone" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700">Vị trí ứng tuyển:</label>
                <select name="position_id" id="position" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="">Chọn vị trí</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}" data-description="{{ $position->description }}">
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700">Mô tả công việc:</label>
                <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded" readonly></textarea>
            </div>
    
            <label class="block text-gray-700">Địa điểm làm việc:</label>
            <select name="location" class="w-full p-2 border border-gray-300 rounded">
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->address }}</option>
                @endforeach
            </select>
    
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Gửi ứng tuyển</button>
        </form>
    </div>
    @if(session('submit'))
<div class="alert alert-success" id="success-message">
    {{ session('submit') }}
</div>
<script>
    setTimeout(() => {
        document.getElementById('success-message').style.display = 'none';
    }, 3000);
</script>
@endif

    
    <script>
    document.getElementById('position').addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('description').value = selectedOption.dataset.description || '';
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