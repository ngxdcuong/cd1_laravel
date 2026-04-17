@extends('dashboard.index')

@section('title', 'Quản lý bài viết')

@section('content')
<div class="card">

    <h2>Danh sách bài viết</h2>

    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Thêm bài viết</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
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
                        <img src="{{ asset('storage/' . $post->image) }}" width="100">
                    @endif
                </td>

                <td>{{ $post->published_at }}</td>

                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Sửa</a>

                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection