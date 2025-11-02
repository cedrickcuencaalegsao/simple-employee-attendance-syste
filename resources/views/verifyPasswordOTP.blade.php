<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Password Reset</title>
</head>

<body>
    <div class="verify-container">
        <div class="verify-card">
            <h1>Verify OTP</h1>

            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif

            <p class="instruction">Enter the OTP code sent to your email to continue with password reset.</p>

            <form action="{{ route('password.otp.verify') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="otp">OTP Code</label>
                    <input type="text" name="otp" id="otp" placeholder="Enter 6-digit code" maxlength="6"
                        pattern="\d{6}" required autofocus>
                    @error('otp')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="verify-btn">Verify OTP</button>
            </form>

            <div class="action-links">
                <p class="resend">
                    Didn't receive the code?
                <form action="{{ route('password.otp.resend') }}" method="POST" class="inline-form">
                    @csrf
                    <button type="submit" class="resend-link">Resend OTP</button>
                </form>
                </p>
                <p class="back-login">
                    <a href="{{ route('login') }}">Back to login</a>
                </p>
            </div>
        </div>
    </div>

    <style>
        :root {
            --dark-blue: #1a237e;
            --medium-blue: #283593;
            --light-blue: #3949ab;
            --white: #ffffff;
            --gray: #f5f5f5;
            --error-red: #dc3545;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--gray);
        }

        .verify-container {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }

        .verify-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        h1 {
            color: var(--dark-blue);
            margin: 0 0 1rem 0;
            font-size: 1.6rem;
        }

        .instruction {
            color: #555;
            margin-bottom: 1.5rem;
            font-size: 0.98rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            color: var(--dark-blue);
            font-weight: 500;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1.2rem;
            box-sizing: border-box;
            text-align: center;
            letter-spacing: 0.2em;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: var(--medium-blue);
            box-shadow: 0 0 0 2px rgba(41, 98, 255, 0.1);
        }

        .verify-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--medium-blue);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .verify-btn:hover {
            background-color: var(--light-blue);
        }

        .error-message,
        .error {
            color: var(--error-red);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .success-message {
            color: #28a745;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .action-links {
            margin-top: 1.5rem;
        }

        .resend {
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            color: #555;
        }

        .inline-form {
            display: inline;
        }

        .resend-link {
            background: none;
            border: none;
            padding: 0;
            color: var(--medium-blue);
            font-weight: 600;
            cursor: pointer;
            text-decoration: underline;
        }

        .resend-link:hover {
            color: var(--light-blue);
        }

        .back-login {
            margin-top: 1rem;
            font-size: 0.95rem;
        }

        .back-login a {
            color: var(--medium-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .back-login a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .verify-container {
                padding: 1rem;
            }

            .verify-card {
                padding: 1.5rem;
            }
        }
    </style>
</body>

</html>
