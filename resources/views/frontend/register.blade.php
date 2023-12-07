<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<form action="/register" method="post">
    @csrf
    <div class="form-group">
        <input type="text" name="name" placeholder="Nhập tên">
    </div>
    <div class="form-group">
        <input type="text" name="email" placeholder="Nhập email">
    </div>
    <div class="form-group">
        <input type="text" name="password" placeholder="Nhập mật khẩu">
    </div>
    <button type="submit">Đăng ký</button>
</form>
<a href="/register">Đăng nhập</a>