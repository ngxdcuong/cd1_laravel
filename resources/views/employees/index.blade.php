<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Nhân Viên</title>
    <link rel="stylesheet" href="{{asset('css/employees/employees.css')}}">
</head>
<body>
    
<div class="container">
    <h2>Danh sách nhân viên</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Thêm Nhân Viên</a>
    @endif
    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary"> Quay lại</a>
    </div>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Mã nhân viên</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Chức vụ</th>
                <th>Lương</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->position->name ?? 'Chưa có' }}</td>
                <td>{{ number_format($employee->salary, 0, ',', '.') }} VNĐ</td>
                <td>{{ ucfirst($employee->status) }}</td>
                <td>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa nhân viên này?')">Xóa</button>
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