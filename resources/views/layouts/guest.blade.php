
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .login-wrapper {
            display: flex;
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-banner {
            background: #f0f0f0;
            color: #333;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 50%;
        }

        .login-banner .logo {
            width: 120px;
            margin-bottom: 20px;
        }

        .login-banner h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .login-banner p {
            font-weight: 300;
            font-size: 1rem;
        }

        .login-form-container {
            background: #2d3748;
            color: #fff;
            padding: 50px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form-container h2 {
            font-weight: 600;
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #fff;
        }

        .login-form-container p {
            color: #e2e8f0;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group .icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-group input {
            width: 100%;
            padding: 12px 12px 12px 45px;
            font-size: 1rem;
            border: 1px solid #4a5568;
            border-radius: 10px;
            background-color: #1a202c;
            color: #fff !important;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background-color: #2d3748;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        .form-group input::placeholder {
            color: #a0aec0;
            opacity: 1; /* Firefox */
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px #1a202c inset !important;
            -webkit-text-fill-color: #fff !important;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .form-actions label {
            color: #e2e8f0;
            font-size: 0.9rem;
        }

        .form-actions a {
            color: #8A9BFF;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .form-actions a:hover {
            color: #a7bfff;
        }

        .submit-button {
            background: linear-gradient(135deg, #7f9cf5 0%, #9b6dff 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .footer {
            text-align: center;
            color: #718096;
            font-size: 0.8rem;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                width: 90%;
            }
            .login-banner, .login-form-container {
                width: 100%;
            }
            .login-banner {
                padding: 30px;
            }
            .login-form-container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-banner">
            <img src="{{ asset('images/SCHEDULIA-Logo.png') }}" alt="SCHEDULIA Logo" class="logo">
            <h1>SCHEDULIA</h1>
            <p>Sistem Penjadwalan Mata Kuliah</p>
        </div>
        <div class="login-form-container">
            <h2>Login</h2>
            <p>Selamat datang kembali! Silakan masuk ke akun Anda.</p>
            
            @yield('content')

            <div class="footer">
                © 2025 Schedulia
            </div>
        </div>
    </div>
</body>
</html>
