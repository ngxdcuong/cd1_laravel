<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa bài viết</title>
    <link rel="stylesheet" href="{{asset('css/post/edit.css')}}">
</head>
<body>
    <div class="container">
        <h2>Chỉnh sửa bài viết</h2>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Ảnh</label>
                <input type="file" name="image" class="form-control">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" width="100" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>

