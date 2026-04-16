<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm địa chỉ</title>
    <link rel="stylesheet" href="{{asset('css/locations/create.css')}}">
</head>
<body>
    <div class="container">
    <h2>{{ isset($location) ? 'Chỉnh sửa' : 'Thêm' }} Địa chỉ</h2>

<form action="{{ isset($location) ? route('locations.update', $location->id) : route('locations.store') }}" method="POST">
    @csrf
    @if(isset($location)) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Địa chỉ:</label>
        <input type="text" name="address" class="form-control" value="{{ $location->address ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Google Map Link:</label>
        <input type="url" name="google_map_link" class="form-control" value="{{ $location->google_map_link ?? '' }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($location) ? 'Cập nhật' : 'Thêm mới' }}</button>
    <a href="{{ route('locations.index') }}" class="btn btn-secondary">Hủy</a>

</form>
    </div>
</body>
</html>


