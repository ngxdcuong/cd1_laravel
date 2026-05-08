@extends('dashboard.index')

@section('title', 'Danh sách tuyển dụng')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/recruitments/manager.css') }}">
@endpush

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Danh sách tuyển dụng</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table>
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
                        <form action="{{ route('recruitments.approve', $recruitment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-success btn-sm">Xét duyệt</button>
                        </form>

                        <form action="{{ route('recruitments.reject', $recruitment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-danger btn-sm">Hủy bỏ</button>
                        </form>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection