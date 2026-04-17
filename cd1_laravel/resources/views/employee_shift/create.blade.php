<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Phân Công</title>
    <link rel="stylesheet" href="{{ asset('css/employee_shift/create.css') }}">
</head>
<body>
    <div class="container">
        <h2>Phân Công Ca Làm Việc</h2>
    
        {{-- Hiển thị thông báo lỗi --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
        {{-- Hiển thị thông báo thành công --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('employee_shift.store') }}" method="POST">
            @csrf
    
            {{-- Chọn nhân viên --}}
            <div class="mb-3">
                <label class="form-label">Nhân Viên</label>
                <select name="employee_id" class="form-control" required>
                    <option value="">-- Chọn Nhân Viên --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                    @endforeach
                </select>
            </div>
    
            {{-- Chọn ca làm --}}
            <div class="mb-3">
                <label class="form-label">Ca Làm Việc</label>
                <select name="shift_id" class="form-control" required>
                    <option value="">-- Chọn Ca Làm --</option>
                    @foreach($shifts as $shift)
                        <option value="{{ $shift->id }}">{{ $shift->name }} ({{ $shift->start_time }} - {{ $shift->end_time }})</option>
                    @endforeach
                </select>
            </div>
    
            {{-- Chọn ngày làm việc --}}
            <div class="mb-3">
                <label class="form-label">Ngày Làm Việc</label>
                <input type="date" name="work_date" class="form-control" required>
            </div>
    
            <button type="submit" class="btn btn-success">Phân Công</button>
            <a href="{{ route('employee_shift.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>

