@extends('dashboard.index')

@section('title', 'Quản lý nhân viên')

@section('content')
<div class="card">

    <h2>Danh sách nhân viên</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Thêm Nhân Viên</a>
    @endif

    <table>
        <thead>
            <tr>
                <th>Mã</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Chức vụ</th>
                <th>Lương</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->position->name ?? 'Chưa có' }}</td>
                <td>{{ number_format($employee->salary, 0, ',', '.') }} VNĐ</td>
                <td>{{ ucfirst($employee->status) }}</td>
                <td>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Xóa</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection