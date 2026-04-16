<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản lý quán cà phê')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Hệ Thống Quản Lý</h1>
    
        <h4 class="text-center">Chào mừng, {{ auth()->user()->username }}!</h4>
        <p class="text-center"><strong>Vai trò:</strong> {{ auth()->user()->role }}</p>
    
        <div class="row justify-content-center">
            @if(auth()->user()->role == 'admin')
                <div class="col-md-4">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-block mb-2">Quản lý Nhân viên</a>
                    <a href="{{ route('shifts.index') }}" class="btn btn-success btn-block mb-2">Quản lý Ca làm</a>
                    <a href="{{ route('employee_shift.index') }}" class="btn btn-warning btn-block mb-2">Phân công Ca làm</a>
                    <a href="{{ route('positions.index') }}" class="btn btn-danger btn-block mb-2">Quản lý Chức vụ</a>
                    <a href="{{ route('salaries.index') }}" class="btn btn-purple btn-block mb-2">Quản lý Lương</a>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-info btn-block mb-2">Quản lý Bài viết</a>
                    <a href="{{ route('locations.index') }}" class="btn btn-pink btn-block mb-2">Quản lý Địa chỉ</a>
                    <a href="{{ route('about.about_manager') }}" class="btn btn-red btn-block mb-2">Quản lý Thông tin giới thiệu</a>
                    <a href="{{ route('users.index') }}" class="btn btn-green btn-block mb-2">Quản lý Tài khoản</a>
                </div>
            @elseif(auth()->user()->role == 'manager')
                <div class="col-md-4">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-block mb-2">Quản lý Nhân viên</a>
                    <a href="{{ route('shifts.index') }}" class="btn btn-success btn-block mb-2">Quản lý Ca làm</a>
                    <a href="{{ route('employee_shift.index') }}" class="btn btn-warning btn-block mb-2">Phân công Ca làm</a>
                    <a href="{{ route('positions.index') }}" class="btn btn-danger btn-block mb-2">Quản lý Chức vụ</a>
                    <a href="{{ route('salaries.index') }}" class="btn btn-purple btn-block mb-2">Quản lý Lương</a>
                    <a href="{{ route('recruitments.manager') }}" class="btn btn-pink btn-block mb-2">Quản lý Tuyển dụng</a>
                    <a href="{{ route('attendance.index') }}" class="btn btn-teal btn-block mb-2">Chấm công</a>
                </div>
            @elseif(auth()->user()->role == 'staff')
                <div class="col-md-4">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-block mb-2">Xem Nhân viên</a>
                    <a href="{{ route('shifts.index') }}" class="btn btn-success btn-block mb-2">Xem Ca làm</a>
                    <a href="{{ route('employee_shift.index') }}" class="btn btn-warning btn-block mb-2">Xem Phân công Ca làm</a>
                    <a href="{{ route('positions.index') }}" class="btn btn-danger btn-block mb-2">Xem Chức vụ</a>
                    <a href="{{ route('salaries.index') }}" class="btn btn-purple btn-block mb-2">Xem Lương</a>
                    <a href="{{ route('attendance.index') }}" class="btn btn-teal btn-block mb-2">Chấm công</a>
                </div>
            @endif
        </div>
    
        <div class="text-center mt-4">
               <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
            
        </div>
    </div>
    
</body>
</html>
