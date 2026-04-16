<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Lương</title>
    <link rel="stylesheet" href="{{asset('css/salaries.css')}}">
</head>
<body>
    
<div class="container">
    <h2>Quản Lý Lương Nhân Viên</h2>

    <!-- Form tìm kiếm -->
    <form action="{{ route('salaries.index') }}" method="GET" class="mb-3">
        <div class="row">
            <!-- Chọn nhân viên -->
            <div class="col-md-3">
                <select name="employee_id" class="form-control">
                    <option value="">-- Chọn nhân viên --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ request('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Chọn chức vụ -->
            <div class="col-md-3">
                <select name="position_id" class="form-control">
                    <option value="">-- Chọn chức vụ --</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{ request('position_id') == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nút tìm kiếm -->
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <!-- Nút quay lại trang chủ -->
<div class="mb-3">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại</a>
</div>

    <!-- Bảng hiển thị lương -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nhân viên</th>
            <th>Chức vụ</th> <!-- Thêm cột chức vụ -->
            <th>Lương cơ bản</th>
            <th>Tổng giờ làm</th>
            <th>Tổng lương</th>
            <th>Tháng lương</th>
        </tr>
    </thead>
   <tbody>
    @foreach ($salaries as $salary)
    <tr>
        <td>{{ $salary->employee?->full_name ?? $salary->employee_name ?? 'Chưa có nhân viên' }}</td>
        <td>{{ $salary->employee?->position?->name ?? 'Chưa có chức vụ' }}</td>
        <td>{{ number_format($salary->employee?->salary ?? $salary->base_salary ?? 0, 0, ',', '.') }} VND</td>
        <td>{{ $salary->total_work_hours ?? 0 }} giờ</td>
        <td>{{ number_format($salary->total_salary ?? 0, 0, ',', '.') }} VND</td>
        <td>
            @if ($salary->salary_month)
                {{ \Carbon\Carbon::parse($salary->salary_month)->format('m/Y') }}
            @else
                Chưa có
            @endif
        </td>
    </tr>
    @endforeach
</tbody>

</table>


</div>

</body>
</html>