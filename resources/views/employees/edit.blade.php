<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Nhân viên</title>
    <link rel="stylesheet" href="{{asset('css/employees/edit.css')}}">
</head>
<body>
    
<div class="container">
    <h2>Chỉnh sửa nhân viên</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="full_name" class="form-label">Họ và tên</label>
            <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $employee->full_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea name="address" class="form-control">{{ old('address', $employee->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Ngày sinh</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob', $employee->dob) }}">
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Giới tính</label>
            <select name="gender" class="form-control">
                <option value="Nam" {{ $employee->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ $employee->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                <option value="Khác" {{ $employee->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="position_id" class="form-label">Chức vụ</label>
            <select name="position_id" class="form-control">
                <option value="">Chọn chức vụ</option>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Lương</label>
            <input type="number" name="salary" class="form-control" value="{{ old('salary', $employee->salary) }}" min="0">
        </div>

        <div class="mb-3">
            <label for="hire_date" class="form-label">Ngày vào làm</label>
            <input type="date" name="hire_date" class="form-control" value="{{ old('hire_date', $employee->hire_date) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Đang làm việc</option>
                <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Nghỉ việc</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>