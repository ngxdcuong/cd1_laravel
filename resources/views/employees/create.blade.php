@extends('dashboard.index')

@section('title', 'Thêm nhân viên')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employees/create.css') }}">
@endpush

@section('content')

<div class="employee-page">

    <div class="form-box card">

        <h2>Thêm nhân viên</h2>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="input-group"><input type="text" name="full_name" placeholder="Họ và tên" required></div>
            <div class="input-group"><input type="email" name="email" placeholder="Email"></div>
            <div class="input-group"><input type="text" name="phone" placeholder="Số điện thoại"></div>
            <div class="input-group"><input type="text" name="address" placeholder="Địa chỉ"></div>
            <div class="input-group"><input type="date" name="dob"></div>

            <div class="input-group">
                <select name="gender">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>

            <div class="input-group">
                <select name="position_id">
                    <option value="">-- Chức vụ --</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group"><input type="number" name="salary" placeholder="Lương"></div>
            <div class="input-group"><input type="date" name="hire_date"></div>

            <div class="input-group">
                <select name="status">
                    <option value="active">Đang làm</option>
                    <option value="inactive">Nghỉ</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Thêm</button>
            <a href="{{ route('employees.index') }}" class="btn-cancel">Hủy</a>
        </form>

    </div>

</div>

@endsection