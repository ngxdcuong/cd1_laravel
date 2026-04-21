@extends('dashboard.index')

@section('title', 'Sửa nhân viên')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employees/edit.css') }}">
@endpush

@section('content')

<div class="employee-page">

    <div class="form-box card">

        <h2>Chỉnh sửa nhân viên</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input type="text" name="full_name" value="{{ $employee->full_name }}" required>
            </div>

            <div class="input-group">
                <input type="email" name="email" value="{{ $employee->email }}">
            </div>

            <div class="input-group">
                <input type="text" name="phone" value="{{ $employee->phone }}">
            </div>

            <div class="input-group">
                <input type="text" name="address" value="{{ $employee->address }}">
            </div>

            <div class="input-group">
                <input type="date" name="dob" value="{{ $employee->dob }}">
            </div>

            <div class="input-group">
                <select name="gender">
                    <option value="Nam" {{ $employee->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ $employee->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    <option value="Khác" {{ $employee->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
                </select>
            </div>

            <div class="input-group">
                <select name="position_id">
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <input type="number" name="salary" value="{{ $employee->salary }}">
            </div>

            <div class="input-group">
                <input type="date" name="hire_date" value="{{ $employee->hire_date }}">
            </div>

            <div class="input-group">
                <select name="status">
                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Đang làm</option>
                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Nghỉ</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>
            <a href="{{ route('employees.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection