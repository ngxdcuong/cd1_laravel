<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Chức Vụ</title>
    <link rel="stylesheet" href="{{asset('css/poisitions/poisitions.css')}}">
</head>
<body>
    
<div class="container">
    <h2>Quản lý Chức Vụ</h2>
    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
    <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Thêm Chức Vụ</a>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại</a>
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Chức Vụ</th>
                <th>Mô Tả</th>
                <th>Ngày Tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $position)
                <tr>
                    <td>{{ $position->id }}</td>
                    <td>{{ $position->name }}</td>
                    <td>{{ $position->description ?? 'Không có mô tả' }}</td>
                    <td>{{ $position->created_at }}</td>
                    <td>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>