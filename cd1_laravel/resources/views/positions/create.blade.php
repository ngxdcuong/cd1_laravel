@extends('dashboard.index')

@section('title', 'Thêm chức vụ')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/poisitions/create.css') }}">
@endpush

@section('content')

<div class="position-page">

    <div class="form-box card">

        <h2>Thêm chức vụ</h2>

        <form action="{{ route('positions.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <input type="text" name="name" placeholder="Tên chức vụ" required>
            </div>

            <div class="input-group">
                <textarea name="description" placeholder="Mô tả"></textarea>
            </div>

            <button type="submit" class="btn-submit">Lưu</button>

            <a href="{{ route('positions.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection