@extends('dashboard.index')

@section('title', 'Giới thiệu')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about/manager.css') }}">
@endpush

@section('content')
<div class="card">

    <div class="card-header">
        <h2>Quản lý Giới Thiệu</h2>
        <a href="{{ route('about.create') }}" class="btn btn-primary">Thêm</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td>{{ $about->title }}</td>
                <td>{{ \Illuminate\Support\Str::limit($about->content, 50) }}</td>
                <td>
                    @if($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline;">
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