<form action="/login" method="post">
    @csrf
    <input type="text" name="email">
    <input type="text" name="password">
    <button type="submit">Đăng nhập</button>
</form>
<a href="/register">Đăng ký</a>