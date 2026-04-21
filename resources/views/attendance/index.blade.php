@extends('dashboard.index')

@section('title', 'Chấm công')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endpush

@section('content')
<div class="card">

    <div class="card-header">
        <h2>Chấm Công Nhân Viên</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="attendance-wrapper">

        <form action="{{ route('attendances.checkin') }}" method="POST" class="attendance-form">
            @csrf
            <h3>Check-in</h3>
            <input type="text" name="employee_id" placeholder="Mã nhân viên" required>
            <button class="btn btn-success">Check-in</button>
        </form>

        <form action="{{ route('attendances.checkout') }}" method="POST" class="attendance-form">
            @csrf
            <h3>Check-out</h3>
            <input type="text" name="employee_id" placeholder="Mã nhân viên" required>
            <button class="btn btn-danger">Check-out</button>
        </form>

    </div>

</div>
@endsection