@extends('dashboard.index')

@section('title', 'Quản lý tài khoản')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/users/users.css') }}">
@endpush

@section('content')
<div class="card users-page">

    <div class="card-header">
        <h2>Quản lý tài khoản</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm tài khoản</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection