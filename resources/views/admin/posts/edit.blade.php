@extends('dashboard.index')

@section('title', 'Chỉnh sửa bài viết')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post/edit.css') }}">
@endpush

@section('content')

<div class="post-page">

    <div class="form-box card">

        <h2>Chỉnh sửa bài viết</h2>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input type="text" name="title" value="{{ $post->title }}" required>
            </div>

            <div class="input-group">
                <textarea name="content" rows="5" required>{{ $post->content }}</textarea>
            </div>

            <div class="input-group">
                <input type="file" name="image">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="preview-img">
                @endif
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>
            <a href="{{ route('admin.posts.index') }}" class="btn-cancel">Hủy</a>

        </form>

    </div>

</div>

@endsection