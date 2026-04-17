@extends('dashboard.index')

@section('title', 'Quản lý địa chỉ')

@section('content')
<div class="card">

    <h2>Quản lý Địa chỉ</h2>

    <a href="{{ route('locations.create') }}" class="btn btn-primary">Thêm Địa chỉ</a>

    <table>
        <thead>
            <tr>
                <th>Địa chỉ</th>
                <th>Google Maps</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td>{{ $location->address }}</td>
                <td>
                    <a href="{{ $location->google_map_link }}" target="_blank">
                        Xem Maps
                    </a>
                </td>
                <td>
                    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Sửa</a>

                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection