@extends('dashboard.index')

@section('title', 'Sửa địa chỉ')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/locations/create.css') }}">
@endpush

@section('content')

<div class="location-page">

    <div class="form-box card">

        <h2>Chỉnh sửa địa chỉ</h2>

        <form action="{{ route('locations.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input 
                    type="text" 
                    name="address" 
                    value="{{ $location->address }}" 
                    required>
            </div>

            <div class="input-group">
                <input 
                    type="url" 
                    name="google_map_link" 
                    value="{{ $location->google_map_link }}" 
                    required>
            </div>

            <button type="submit" class="btn-submit">Cập nhật</button>
            <a href="{{ route('locations.index') }}" class="btn-cancel">Hủy</a>

        </form>

    </div>

</div>

@endsection