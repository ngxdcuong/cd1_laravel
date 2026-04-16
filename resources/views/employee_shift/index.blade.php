<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phân Công</title>
    <link rel="stylesheet" href="{{ asset('css/employee_shift/employee_shift.css') }}">
</head>
<body>
    <div class="container">
        <h2>Danh Sách Phân Công Ca Làm</h2>
    
        {{-- Hiển thị thông báo --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
        <a href="{{ route('employee_shift.create') }}" class="btn btn-primary mb-3">Thêm Phân Công</a>
        @endif
        <div class="mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại trang chủ</a>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Nhân Viên</th>
                    <th>Ca Làm</th>
                    <th>Ngày Làm</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
          <tbody>
    @foreach($employeeShifts as $shift)
    <tr>
        <td>{{ $loop->iteration }}</td>

        {{-- Nhân viên --}}
        <td>{{ $shift->employee->full_name ?? 'Không có nhân viên' }}</td>

        {{-- Ca làm --}}
        <td>
            @if($shift->shift)
                {{ $shift->shift->name }} 
                ({{ $shift->shift->start_time }} - {{ $shift->shift->end_time }})
            @else
                Chưa có ca
            @endif
        </td>

        {{-- Ngày làm --}}
        <td>{{ $shift->work_date }}</td>

        {{-- Hành động --}}
        <td>
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
                <a href="{{ route('employee_shift.edit', $shift->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('employee_shift.destroy', $shift->id) }}" method="POST" style="display:inline;">
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
