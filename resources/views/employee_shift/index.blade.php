@extends('dashboard.index')

@section('title', 'Phân công ca làm')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee_shift/employee_shift.css') }}">
@endpush

@section('content')
<div class="card">

    <div class="card-header">
        <h2>Danh Sách Phân Công</h2>

        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
            <a href="{{ route('employee_shift.create') }}" class="btn btn-primary">Thêm</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Nhân viên</th>
                <th>Ca</th>
                <th>Ngày</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($employeeShifts as $shift)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $shift->employee->full_name ?? 'Không có' }}</td>
                <td>{{ $shift->shift->name ?? 'Chưa có' }}</td>
                <td>{{ $shift->work_date }}</td>
                <td>
                    <a href="{{ route('employee_shift.edit', $shift->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('employee_shift.destroy', $shift->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection