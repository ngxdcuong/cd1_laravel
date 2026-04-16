<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm tài khoản mới</title>
    <link rel="stylesheet" href="{{asset('css/users/create.css')}}">

</head>
<body>
<form id="userForm">
    @csrf
    <input type="text" name="username" placeholder="Nhập username" required>
    <input type="password" name="password" placeholder="Nhập password" required>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        <option value="staff">Staff</option>
    </select>
    <button type="submit">Tạo tài khoản</button>
    <div class="mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Hủy</a>
    </div>
</form>

<script>
document.getElementById("userForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn form reload trang

    let formData = new FormData(this);

    fetch("{{ route('users.store') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-Requested-With": "XMLHttpRequest", // Xác định request là AJAX
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response:", data);
        alert(data.message);
    })
    .catch(error => console.error("Lỗi:", error));
});
</script>

</body>
</html>