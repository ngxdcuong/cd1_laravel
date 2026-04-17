<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sủa thông tin giới thiệu</title>
    <link rel="stylesheet" href="{{asset('css/about/edit.css')}}">
</head>
<body>
<div class="container">
    <h2>Chỉnh sửa Giới Thiệu</h2>

    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tiêu đề:</label>
            <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>
        </div>
        <div class="mb-3">
            <label>Nội dung:</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $about->content }}</textarea>
        </div>
        <div class="mb-3">
            <label>Hình ảnh:</label>
            <input type="file" name="image" class="form-control">
            @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('about.about_manager') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>


</body>
</html>