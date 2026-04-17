<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Thông tin giới thiệu</title>
    <link rel="stylesheet" href="{{asset('css/about/manager.css')}}">
</head>
<body>
    
<div class="container">
    <h2>Quản lý Giới Thiệu</h2>
    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary"> Quay lại</a>
    </div>
    <a href="{{ route('about.create') }}" class="btn btn-success mb-3">Thêm mới</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td>{{ $about->title }}</td>
                <td>{{ Str::limit($about->content, 50) }}</td>
                <td>
                    @if($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" width="100">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>
                    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary">Sửa</a>
                    <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa thông tin này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>