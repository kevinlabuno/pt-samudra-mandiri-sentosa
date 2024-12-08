<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Samudra Mandiri Sentosa - Login</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }
        .login-logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: contain;
            margin-bottom: 20px;
            padding: 10px;
        }
        .login-title {
            font-size: 26px;
            font-weight: bold;
            color: #153B5F;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }
        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }
        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #153B5F;
            margin-bottom: 8px;
        }
        .login-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 15px;
            box-sizing: border-box;
            outline: none;
        }
        .login-input:focus {
            border-color: #153B5F;
            box-shadow: 0 0 5px rgba(21, 59, 95, 0.2);
        }
        .login-button {
            background-color: #153B5F;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #0e2b4c;
        }
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            text-align: left;
            font-size: 14px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
                max-width: 90%;
            }
            .login-logo {
                width: 100px;
                height: 100px;
            }
            .login-title {
                font-size: 22px;
            }
            .login-button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('logo.png') }}" alt="Logo PT. Samudra Mandiri Sentosa" class="login-logo">
        <h1 class="login-title">PT. Samudra Mandiri Sentosa</h1>

        <!-- Flash Messages for Success or Error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="login-input" placeholder="Masukkan email Anda" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="login-input" placeholder="Masukkan password Anda" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
