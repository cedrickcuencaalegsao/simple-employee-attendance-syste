<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h1>Login</h1>
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                    @error('username')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit">Login</button>
            </form>
            <div class="forgot-password">
                <a href="{{ route('password.request')}}">Forgot your password?</a>
            </div>
            <div class="time-buttons">
                <div class="time-in">
                    <a href="{{ route('time.in.index') }}" class="time-button time-in-button">Time In</a>
                </div>
                <div class="time-out">
                    <a href="{{ route('time.out.index') }}" class="time-button time-out-button">Time Out</a>
                </div>
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

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .login-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--dark-blue);
            margin: 0 0 1.5rem 0;
            text-align: center;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
            font-weight: 500;
        }

        input {
            width: calc(100% - 0.1rem);
            /* Subtracting padding from width */
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
            box-sizing: border-box;
            /* Include padding in width calculation */
        }

        input:focus {
            outline: none;
            border-color: var(--medium-blue);
            box-shadow: 0 0 0 2px rgba(41, 98, 255, 0.1);
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--medium-blue);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            box-sizing: border-box;
            /* Include padding in width calculation */
        }

        button:hover {
            background-color: var(--light-blue);
        }

        .error-message,
        .error {
            color: var(--error-red);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 1rem;
        }

        .forgot-password a {
            color: var(--medium-blue);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
            color: var(--light-blue);
        }

        .success-message {
            color: #28a745;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 1rem;
            }

            .login-card {
                padding: 1.5rem;
            }
        }

        .time-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .time-in,
        .time-out {
            flex: 1;
        }

        .time-button {
            display: block;
            width: 85%;
            padding: 0.75rem;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        .time-button:hover {
            opacity: 0.9;
        }

        .time-in-button {
            background-color: #28a745;
            color: var(--white);
        }

        .time-out-button {
            background-color: #dc3545;
            color: var(--white);
        }

        /* Update existing media query */
        @media (max-width: 500px) {
            .login-container {
                padding: 1rem;
            }

            .login-card {
                padding: 1.5rem;
            }

            .time-buttons {
                flex-direction: column;
            }
        }
    </style>
</body>

</html>
