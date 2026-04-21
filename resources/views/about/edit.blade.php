@extends('dashboard.index')

@section('title', 'Sửa giới thiệu')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about/edit.css') }}">
@endpush

@section('content')

<div class="about-page">

    <div class="form-box card">

        <h2>Chỉnh sửa giới thiệu</h2>

        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input type="text" name="title" value="{{ $about->title }}" required>
            </div>

            <div class="input-group">
                <textarea name="content" rows="5" required>{{ $about->content }}</textarea>
            </div>

            <div class="input-group">
                <input type="file" name="image">
                @if($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" class="preview-img">
                @endif
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>
            <a href="{{ route('about.about_manager') }}" class="btn-cancel">Hủy</a>

        </form>

    </div>

</div>

@endsection