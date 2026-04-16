<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Tài Khoản</title>
    <link rel="stylesheet" href="{{asset('css/users/edit.css')}}">

</head>
<body>
    
<div class="container">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>Chỉnh sửa tài khoản</h2>
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>
        
        <div class="form-group">
            <label for="password">Mật khẩu mới (để trống nếu không muốn đổi)</label>
            <input type="password" name="password" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="role">Vai trò</label>
            <select name="role" class="form-control">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <div class="mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>
</body>
</html>