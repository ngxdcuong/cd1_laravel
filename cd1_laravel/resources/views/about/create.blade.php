@extends('dashboard.index')

@section('title', 'Thêm giới thiệu')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about/create.css') }}">
@endpush

@section('content')

<div class="about-page">

    <div class="form-box card">

        <h2>Thêm thông tin giới thiệu</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
                <input type="text" name="title" placeholder="Tiêu đề" required>
            </div>

            <div class="input-group">
                <textarea name="content" rows="5" placeholder="Nội dung" required></textarea>
            </div>

            <div class="input-group">
                <input type="file" name="image">
            </div>

            <button type="submit" class="btn-submit">Thêm</button>
            <a href="{{ route('about.about_manager') }}" class="btn-cancel">Hủy</a>

        </form>

    </div>

</div>

@endsection