<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Nhân Viên</title>
    <link rel="stylesheet" href="{{asset('css/employees/create.css')}}">

</head>
<body>
    
<div class="container">
    <h2>Thêm Nhân Viên</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Họ và tên:</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Số điện thoại:</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label>Địa chỉ:</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="form-group">
            <label>Ngày sinh:</label>
            <input type="date" name="dob" class="form-control">
        </div>

        <div class="form-group">
            <label>Giới tính:</label>
            <select name="gender" class="form-control">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label>Chức vụ:</label>
            <select name="position_id" class="form-control">
                <option value="">-- Chọn chức vụ --</option>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Lương:</label>
            <input type="number" name="salary" class="form-control">
        </div>

        <div class="form-group">
            <label>Ngày vào làm:</label>
            <input type="date" name="hire_date" class="form-control">
        </div>

        <div class="form-group">
            <label>Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="active">Đang làm việc</option>
                <option value="inactive">Nghỉ việc</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-2">Thêm nhân viên</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Hủy</a>

    </form>
</div>

</body>
</html>