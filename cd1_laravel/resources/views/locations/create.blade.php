@extends('dashboard.index')

@section('title', 'Thêm địa chỉ')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/locations/create.css') }}">
@endpush

@section('content')

<div class="location-page">

    <div class="form-box card">

        <h2>Thêm địa chỉ</h2>

        <form action="{{ route('locations.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <input type="text" name="address" placeholder="Nhập địa chỉ" required>
            </div>

            <div class="input-group">
                <input type="url" name="google_map_link" placeholder="Link Google Map" required>
            </div>

            <button type="submit" class="btn-submit">Thêm</button>
            <a href="{{ route('locations.index') }}" class="btn-cancel">Hủy</a>

        </form>

    </div>

</div>

@endsection