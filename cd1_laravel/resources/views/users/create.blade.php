@extends('dashboard.index')

@section('title', 'Thêm tài khoản')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/users/create.css') }}">
@endpush

@section('content')

<div class="user-page">

    {{-- Dùng card của dashboard --}}
    <div class="card form-box">

        <h2>Thêm tài khoản</h2>

        <form id="userForm">
            @csrf

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Nhập username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Nhập password" required>
            </div>

            <div class="input-group">
                <label>Vai trò</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <div class="btn-group">
                {{-- Dùng button dashboard --}}
                <button type="submit" class="btn btn-success">Tạo tài khoản</button>

                <a href="{{ route('users.index') }}" class="btn btn-danger">Hủy</a>
            </div>
        </form>

    </div>

</div>

@endsection