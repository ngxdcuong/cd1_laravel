<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Ca Làm Việc</title>
    <link rel="stylesheet" href="{{asset('css/shifts/shifts.css')}}">
</head>
<body>
    
<div class="container">
    <h2>Quản lý Ca Làm Việc</h2>
    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
    <a href="{{ route('shifts.create') }}" class="btn btn-primary mb-3">Thêm Ca</a>
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
                <th>Tên Ca</th>
                <th>Bắt Đầu</th>
                <th>Kết Thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->id }}</td>
                <td>{{ $shift->name }}</td>
                <td>{{ $shift->start_time }}</td>
                <td>{{ $shift->end_time }}</td>
                <td>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
                    <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa ca này?')">Xóa</button>
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