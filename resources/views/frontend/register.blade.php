<form action="/register" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nhập tên">
    <input type="text" name="email" placeholder="Nhập email">
    <input type="text" name="password" placeholder="Nhập mật khẩu">
    <button type="submit">Đăng ký</button>
</form>
<a href="/register">Đăng nhập</a>