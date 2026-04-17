<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý bài viết</title>
    <link rel="stylesheet" href="{{asset('css/post/index.css')}}">
</head>
<body>
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại</a>
        </div>
        
        <div class="container">
            <h2 class="mb-3">Danh sách bài viết</h2>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Thêm bài viết</a>
    
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Ngày xuất bản</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh bài viết" width="100">
                                @endif
                            </td>
                            <td>{{ $post->published_at }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa bài viết này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>
    
