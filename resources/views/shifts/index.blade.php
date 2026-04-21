@extends('dashboard.index')

@section('title', 'Ca làm')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/shifts/shifts.css') }}">
@endpush

@section('content')
<div class="card shifts-page">

    <div class="card-header">
        <h2>Quản lý ca</h2>
        <a href="{{ route('shifts.create') }}" class="btn btn-primary">Thêm</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
            </tr>
        </thead>

        <tbody>
            @foreach($shifts as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->start_time }}</td>
                <td>{{ $s->end_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection