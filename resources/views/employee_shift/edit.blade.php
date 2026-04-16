<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Phân Công</title>
    <link rel="stylesheet" href="{{ asset('css/employee_shift/edit.css') }}">
</head>
<body>
    <form action="{{ route('employee_shift.update', $employeeShift->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Nhân viên:</label>
            <select name="employee_id" class="form-control">
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" 
                        {{ $employee->id == $employeeShift->employee_id ? 'selected' : '' }}>
                        {{ $employee->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="shift_id">Ca làm:</label>
            <select name="shift_id" class="form-control">
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}" 
                        {{ $shift->id == $employeeShift->shift_id ? 'selected' : '' }}>
                        {{ $shift->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="work_date">Ngày làm việc:</label>
            <input type="date" name="work_date" class="form-control" value="{{ $employeeShift->work_date }}">
        </div>
    
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('employee_shift.index') }}" class="btn btn-secondary">Hủy</a>
    </form>    
</body>
</html>
