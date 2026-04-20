@extends('dashboard.index')

@section('title', 'Phân công ca làm')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee_shift/create.css') }}">
@endpush

@section('content')

<div class="shift-page">

    <div class="form-box card">

        <h2>Phân công ca làm</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('employee_shift.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <select name="employee_id" required>
                    <option value="">-- Chọn nhân viên --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <select name="shift_id" required>
                    <option value="">-- Chọn ca --</option>
                    @foreach($shifts as $shift)
                        <option value="{{ $shift->id }}">
                            {{ $shift->name }} ({{ $shift->start_time }} - {{ $shift->end_time }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <input type="date" name="work_date" required>
            </div>

            <button type="submit" class="btn-submit">Phân công</button>
            <a href="{{ route('employee_shift.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection