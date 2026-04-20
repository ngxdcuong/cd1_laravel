@extends('dashboard.index')

@section('title', 'Sửa ca làm việc')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/shifts/edit.css') }}">
@endpush

@section('content')

<div class="shift-page">

    <div class="form-box card">

        <h2>Chỉnh sửa ca làm việc</h2>

        <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input type="text" name="name" value="{{ $shift->name }}" required>
            </div>

            <div class="input-group">
                <input type="time" name="start_time" value="{{ $shift->start_time }}" required>
            </div>

            <div class="input-group">
                <input type="time" name="end_time" value="{{ $shift->end_time }}" required>
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>

            <a href="{{ route('shifts.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection