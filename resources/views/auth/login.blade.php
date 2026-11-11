<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login - MyProfile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #263238, #607d8b);
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0,0,0,.25);
        }

        .login-card h3 {
            font-weight: 700;
            text-align: center;
            margin-bottom: 25px;
        }

        .btn-login {
            background: #ffc107;
            border: none;
            width: 100%;
            padding: 11px;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #e0a800;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h3>Admin Login</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   placeholder="Masukkan email"
                   required>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>
        </div>

        <button type="submit" class="btn btn-login">
            Login
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="/" class="text-decoration-none">Kembali ke Home</a>
    </div>

</div>

</body>
</html>
