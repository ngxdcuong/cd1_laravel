@extends('dashboard.index')

@section('title', 'Thêm ca làm việc')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/shifts/create.css') }}">
@endpush

@section('content')

<div class="shift-page">

    <div class="form-box card">

        <h2>Thêm ca làm việc</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('shifts.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <input type="text" name="name" placeholder="Tên ca" required>
            </div>

            <div class="input-group">
                <input type="time" name="start_time" required>
            </div>

            <div class="input-group">
                <input type="time" name="end_time" required>
            </div>

            <button type="submit" class="btn-submit">Thêm</button>

            <a href="{{ route('shifts.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection