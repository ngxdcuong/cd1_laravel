@extends('dashboard.index')

@section('title', 'Chấm công')

@section('content')
<div class="card">

    <h2>Chấm Công Nhân Viên</h2>

    {{-- Thông báo --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div style="display:flex; gap:20px; margin-top:20px; flex-wrap:wrap;">

        <!-- CHECK IN -->
        <form action="{{ route('attendances.checkin') }}" method="POST" class="attendance-form">
            @csrf

            <h3>Check-in</h3>

            <label>Mã nhân viên</label>
            <input type="text" name="employee_id" id="checkin_id" required>

            <button type="submit" class="btn btn-success">Check-in</button>
        </form>

        <!-- CHECK OUT -->
        <form action="{{ route('attendances.checkout') }}" method="POST" class="attendance-form">
            @csrf

            <h3>Check-out</h3>

            <label>Mã nhân viên</label>
            <input type="text" name="employee_id" id="checkout_id" required>

            <button type="submit" class="btn btn-danger">Check-out</button>
        </form>

    </div>

</div>

{{-- Auto copy ID --}}
<script>
    const checkin = document.getElementById('checkin_id');
    const checkout = document.getElementById('checkout_id');

    checkin.addEventListener('input', function () {
        checkout.value = this.value;
    });
</script>

@endsection