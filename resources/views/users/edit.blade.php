@extends('dashboard.index')

@section('title', 'Sửa tài khoản')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/users/edit.css') }}">
@endpush

@section('content')

<div class="user-page">

    {{-- dùng card dashboard --}}
    <div class="card form-box">

        <h2>Chỉnh sửa tài khoản</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="{{ $user->username }}" required>
            </div>

            <div class="input-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="password" placeholder="Để trống nếu không đổi">
            </div>

            <div class="input-group">
                <label>Vai trò</label>
                <select name="role">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>

            <div class="btn-group">
                {{-- dùng button dashboard --}}
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Hủy</a>
            </div>

        </form>

    </div>

</div>

@endsection