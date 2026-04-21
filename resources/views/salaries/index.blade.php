@extends('dashboard.index')

@section('title', 'Lương')

@section('content')
<div class="card">

    <h2>Quản lý lương</h2>

    <form method="GET">
        <select name="employee_id">
            <option value="">-- Nhân viên --</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
            @endforeach
        </select>

        <select name="position_id">
            <option value="">-- Chức vụ --</option>
            @foreach($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-primary">Tìm</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nhân viên</th>
                <th>Chức vụ</th>
                <th>Lương</th>
                <th>Giờ</th>
                <th>Tổng</th>
                <th>Tháng</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($salaries as $salary)
            <tr>
                <td>{{ $salary->employee?->full_name }}</td>
                <td>{{ $salary->employee?->position?->name }}</td>
                <td>{{ number_format($salary->base_salary ?? 0) }}</td>
                <td>{{ $salary->total_work_hours }}</td>
                <td>{{ number_format($salary->total_salary ?? 0) }}</td>
                <td>{{ $salary->salary_month }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection