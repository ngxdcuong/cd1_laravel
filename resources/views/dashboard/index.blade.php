<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Quản lý quán cà phê')</title>

    <!-- CSS chính -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Cho phép page con thêm CSS -->
    @stack('styles')

</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Hệ Thống Quản Lý</h2>

        <div class="user-info">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
            </div>

            <div class="user-text">
                <div class="username">{{ auth()->user()->username }}</div>
                <div class="role">{{ auth()->user()->role }}</div>
            </div>
        </div>

        <ul class="menu">

            {{-- ADMIN --}}
            @if(auth()->user()->role == 'admin')
                <li><a href="{{ route('employees.index') }}">Nhân viên</a></li>
                <li><a href="{{ route('shifts.index') }}">Ca làm</a></li>
                <li><a href="{{ route('employee_shift.index') }}">Phân công</a></li>
                <li><a href="{{ route('positions.index') }}">Chức vụ</a></li>
                <li><a href="{{ route('salaries.index') }}">Lương</a></li>
                <li><a href="{{ route('admin.posts.index') }}">Bài viết</a></li>
                <li><a href="{{ route('locations.index') }}">Địa chỉ</a></li>
                <li><a href="{{ route('about.about_manager') }}">Giới thiệu</a></li>
                <li><a href="{{ route('users.index') }}">Tài khoản</a></li>

            {{-- MANAGER --}}
            @elseif(auth()->user()->role == 'manager')
                <li><a href="{{ route('employees.index') }}">Nhân viên</a></li>
                <li><a href="{{ route('shifts.index') }}">Ca làm</a></li>
                <li><a href="{{ route('employee_shift.index') }}">Phân công</a></li>
                <li><a href="{{ route('positions.index') }}">Chức vụ</a></li>
                <li><a href="{{ route('salaries.index') }}">Lương</a></li>
                <li><a href="{{ route('recruitments.manager') }}">Tuyển dụng</a></li>
                <li><a href="{{ route('attendance.index') }}">Chấm công</a></li>

            {{-- STAFF --}}
            @else
                <li><a href="{{ route('employees.index') }}">Xem nhân viên</a></li>
                <li><a href="{{ route('shifts.index') }}">Xem ca</a></li>
                <li><a href="{{ route('employee_shift.index') }}">Xem phân công</a></li>
                <li><a href="{{ route('positions.index') }}">Xem chức vụ</a></li>
                <li><a href="{{ route('salaries.index') }}">Xem lương</a></li>
                <li><a href="{{ route('attendance.index') }}">Chấm công</a></li>
            @endif

        </ul>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn">Đăng xuất</button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="content-header">
            <h1>@yield('title')</h1>
        </div>

        <div class="content-body">
            @yield('content')
        </div>
    </div>

</div>

<!-- Cho phép page con thêm JS -->
@stack('scripts')

</body>
</html>