<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chấm công</title>
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
</head>
<body>
    <div class="container">
        <h2>Chấm Công Nhân Viên</h2>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary"> Quay lại</a>
        </div>
        
        <form action="{{ route('attendances.checkin') }}" method="POST">
            @csrf
            <label for="employee_id">Mã Nhân Viên:</label>
            <input type="text" name="employee_id" id="employee_id" required>
            <button type="submit">Check-in</button>
        </form>
        
        <form action="{{ route('attendances.checkout') }}" method="POST">
            @csrf
            <label for="employee_id">Mã Nhân Viên:</label>
            <input type="text" name="employee_id" id="employee_id" required>
            <button type="submit">Check-out</button>
        </form>
        
    </div>
    
    <script>
        document.getElementById('employee_id').addEventListener('input', function () {
            document.getElementById('checkout_employee_id').value = this.value;
        });
    </script>    
</body>
</html>
