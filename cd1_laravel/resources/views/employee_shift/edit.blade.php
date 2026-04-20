@extends('dashboard.index')

@section('title', 'Sửa phân công')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee_shift/edit.css') }}">
@endpush

@section('content')

<div class="shift-page">

    <div class="form-box card">

        <h2>Sửa phân công</h2>

        <form action="{{ route('employee_shift.update', $employeeShift->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <select name="employee_id">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ $employee->id == $employeeShift->employee_id ? 'selected' : '' }}>
                            {{ $employee->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <select name="shift_id">
                    @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}"
                            {{ $shift->id == $employeeShift->shift_id ? 'selected' : '' }}>
                            {{ $shift->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <input type="date" name="work_date" value="{{ $employeeShift->work_date }}">
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>
            <a href="{{ route('employee_shift.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection