<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý địa chỉ</title>
    <link rel="stylesheet" href="{{asset('css/locations/index.css')}}">
</head>
<body>
    <div class="container">
    <h2>Quản lý Địa chỉ</h2>
<a href="{{ route('locations.create') }}" class="btn btn-primary">Thêm Địa chỉ</a>
<div class="mb-3">
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Quay lại</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Địa chỉ</th>
            <th>Google Maps</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($locations as $location)
        <tr>
            <td>{{ $location->address }}</td>
            <td><a href="{{ $location->google_map_link }}" target="_blank">Xem trên Maps</a></td>
            <td>
                <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Xóa địa chỉ này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</body>
</html>


