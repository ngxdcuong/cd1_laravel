@extends('dashboard.index')

@section('title', 'Sửa chức vụ')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/poisitions/edit.css') }}">
@endpush

@section('content')

<div class="position-page">

    <div class="form-box card">

        <h2>Chỉnh sửa chức vụ</h2>

        <form action="{{ route('positions.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input type="text" name="name" value="{{ $position->name }}" required>
            </div>

            <div class="input-group">
                <textarea name="description">{{ $position->description }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>

            <a href="{{ route('positions.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection