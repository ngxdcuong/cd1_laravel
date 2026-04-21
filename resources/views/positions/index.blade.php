@extends('dashboard.index')

@section('title', 'Chức vụ')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/poisitions/poisitions.css') }}">
@endpush

@section('content')
<div class="card positions-page">

    <div class="card-header">
        <h2>Quản lý Chức vụ</h2>

        @if(auth()->user()->role !== 'staff')
            <a href="{{ route('positions.create') }}" class="btn btn-primary">Thêm</a>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($positions as $position)
            <tr>
                <td>{{ $position->id }}</td>
                <td>{{ $position->name }}</td>
                <td>{{ $position->description }}</td>
                <td>{{ $position->created_at }}</td>

                <td>
                    @if(auth()->user()->role !== 'staff')
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
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