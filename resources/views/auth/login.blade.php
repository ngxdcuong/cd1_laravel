<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    @if($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Đăng nhập</h2>
        <label>Tên đăng nhập:</label>
        <input type="text" name="username" required>
        <label>Mật khẩu:</label>
        <input type="password" name="password" required>
        <button type="submit">Đăng nhập</button>
        <div class="mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">Quay về Trang Chủ</a>
        </div>
    </form>
</body>
</html>
