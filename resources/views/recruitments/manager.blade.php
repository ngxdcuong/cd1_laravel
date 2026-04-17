<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách tuyển dụng</title>
    <link rel="stylesheet" href="{{asset('css/recruitments/manager.css')}}">
</head>
<body>
<div class="container">
    <h2 class="mb-4">Danh sách tuyển dụng</h2>
    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Vị trí</th>
                <th>Mô tả</th>
                <th>Địa điểm</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recruitments as $recruitment)
            <tr>
                <td>{{ $recruitment->full_name }}</td>
                <td>{{ $recruitment->phone }}</td>
                <td>{{ $recruitment->email }}</td>
                <td>{{ $recruitment->position->name }}</td>
                <td>{{ $recruitment->description }}</td>
                <td>{{ $recruitment->location }}</td>
                <td>
                    @if($recruitment->status == 'approved')
                        <span class="badge bg-success">Đã duyệt</span>
                    @elseif($recruitment->status == 'rejected')
                        <span class="badge bg-danger">Bị từ chối</span>
                    @else
                        <span class="badge bg-warning">Chờ xét duyệt</span>
                    @endif
                </td>
                <td>
                    @if(!$recruitment->status)
                        <form action="{{ route('recruitments.approve', $recruitment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Xét duyệt</button>
                        </form>
                        <form action="{{ route('recruitments.reject', $recruitment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Hủy bỏ</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>