<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sports Tournament Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #172554;
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.10);
        }

        .logo {
            text-align: center;
            font-size: 38px;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .register {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }

        .register a {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        .home {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #172554;
            text-decoration: none;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .error ul {
            padding-left: 18px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="logo">🏆</div>

    <h2>Welcome Back</h2>

    <p class="subtitle">
        Login to Sports Tournament Manager
    </p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter your password"
            required
        >

        <button type="submit" class="btn">
            Login
        </button>
    </form>

    <div class="register">
        Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </div>

    <a href="{{ route('home') }}" class="home">
        ← Back to Home
    </a>

</div>

</body>
</html>