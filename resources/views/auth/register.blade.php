<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Sports Tournament Manager</title>

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

        .register-box {
            width: 420px;
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
            margin-bottom: 17px;
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

        .login {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }

        .login a {
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

<div class="register-box">

    <div class="logo">🏅</div>

    <h2>Create Account</h2>

    <p class="subtitle">
        Join Sports Tournament Manager
    </p>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <label>Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter your name"
            required
        >

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
            placeholder="Enter password"
            required
        >

        <label>Confirm Password</label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm password"
            required
        >

        <button type="submit" class="btn">
            Create Account
        </button>
    </form>

    <div class="login">
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </div>

    <a href="{{ route('home') }}" class="home">
        ← Back to Home
    </a>

</div>

</body>
</html>