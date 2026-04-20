@extends('dashboard.index')

@section('title', 'Thêm bài viết')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post/create.css') }}">
@endpush

@section('content')

<div class="post-page">

    <div class="form-box card">

        <h2>Thêm bài viết</h2>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
                <input type="text" name="title" placeholder="Tiêu đề" required>
            </div>

            <div class="input-group">
                <textarea name="content" placeholder="Nội dung" rows="5" required></textarea>
            </div>

            <div class="input-group">
                <input type="file" name="image">
            </div>

            <div class="input-group">
                <input type="datetime-local" name="published_at">
            </div>

            <button type="submit" class="btn-submit">Lưu</button>
            <a href="{{ route('admin.posts.index') }}" class="btn-cancel">Hủy</a>

        </form>

    </div>

</div>

@endsection