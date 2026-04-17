@extends('dashboard.index')

@section('title', 'Ca làm')

@section('content')
<div class="card">

    <h2>Quản lý Ca</h2>

    @if(auth()->user()->role !== 'staff')
        <a href="{{ route('shifts.create') }}" class="btn btn-primary">Thêm</a>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->id }}</td>
                <td>{{ $shift->name }}</td>
                <td>{{ $shift->start_time }}</td>
                <td>{{ $shift->end_time }}</td>

                <td>
                    @if(auth()->user()->role !== 'staff')
                        <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
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