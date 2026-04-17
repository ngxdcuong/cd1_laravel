<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm thông tin giới thiệu</title>
    <link rel="stylesheet" href="{{asset('css/about/create.css')}}">
</head>
<body>
    <div class="container">
        <h2>Thêm thông tin giới thiệu</h2>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Tiêu đề:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea class="form-control" name="content" rows="4" required></textarea>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Ảnh (nếu có)</label>
                <input type="file" class="form-control" name="image">
            </div>
    
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('about.about_manager') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>

