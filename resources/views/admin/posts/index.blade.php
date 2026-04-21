@extends('dashboard.index')

@section('title', 'Bài viết')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post/index.css') }}">
@endpush

@section('content')
<div class="card">

    <div class="card-header">
        <h2>Danh sách bài viết</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Thêm</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Ngày</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" width="80">
                    @endif
                </td>
                <td>{{ $post->published_at }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection