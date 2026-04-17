<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Ca Làm Việc</title>
    <link rel="stylesheet" href="{{asset('css/shifts/edit.css')}}">

</head>
<body>
    @section('content')
    <div class="container">
        <h2>Sửa Ca Làm Việc</h2>
        <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tên Ca</label>
                <input type="text" name="name" class="form-control" value="{{ $shift->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giờ Bắt Đầu</label>
                <input type="time" name="start_time" class="form-control" value="{{ $shift->start_time }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giờ Kết Thúc</label>
                <input type="time" name="end_time" class="form-control" value="{{ $shift->end_time }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
    
</body>
</html>