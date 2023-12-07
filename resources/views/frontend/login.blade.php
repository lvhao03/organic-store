<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<form action="/login" method="post">
    @csrf
    <div class="form-group">
        <input type="text" name="email" placeholder="Nhập email">
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Nhập mật khẩu">
    </div>
    <button class="btn btn-primary" type="submit">Đăng nhập</button>
</form>
<a href="/register">Đăng ký</a>