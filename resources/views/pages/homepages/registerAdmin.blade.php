<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký người dùng và admin</title>
    <style>
        body {
            width: 100%;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    display: flex;
    justify-content: space-around;
    width: 400px;
}

.form-container {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 180px;
    text-align: center;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Đăng ký admin</h2>
            <form action="/RegisterAdmin" method="post">
                @csrf
                <input type="text" name="username" placeholder="Tên người dùng">
                @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
                <input type="email" name="email" placeholder="Email">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
                <input type="password" name="password" placeholder="Mật khẩu">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
                <button type="submit">Đăng ký</button>
            </form>
        </div>
    </div>
</body>

</html>
