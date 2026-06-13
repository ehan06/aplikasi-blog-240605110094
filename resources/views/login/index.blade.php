<!DOCTYPE html>
<html>
<head>
    <title>Login CMS</title>
</head>
<body>

<h2>Login CMS Blog</h2>

@if(session('gagal'))
<p style="color:red">
    {{ session('gagal') }}
</p>
@endif

<form action="{{ route('login.proses') }}" method="POST">
    @csrf

    <label>Username</label>
    <br>
    <input type="text" name="user_name">
    <br><br>

    <label>Password</label>
    <br>
    <input type="password" name="password">
    <br><br>

    <button type="submit">
        Login
    </button>
</form>

</body>
</html>