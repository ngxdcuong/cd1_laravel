<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Ca Làm Việc</title>
    <link rel="stylesheet" href="{{asset('css/shifts/create.css')}}">

</head>
<body>
    
<div class="container">
    <h2>Thêm Ca Làm Việc</h2>

    {{-- Hiển thị lỗi nếu có --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('shifts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên Ca</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giờ Bắt Đầu</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giờ Kết Thúc</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>

</body>
</html>