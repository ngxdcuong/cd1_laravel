<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Chức Vụ</title>
    <link rel="stylesheet" href="{{asset('css/poisitions/edit.css')}}">

</head>
<body>
    
<div class="container">
    <h2>Chỉnh sửa Chức Vụ</h2>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên Chức Vụ</label>
            <input type="text" name="name" class="form-control" value="{{ $position->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" class="form-control">{{ $position->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>

</body>
</html>