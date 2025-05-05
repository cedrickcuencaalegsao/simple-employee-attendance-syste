<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time In</title>
</head>
<body>
    <div class="container">
        <div class="time-in-card">
            <h1>Time In</h1>
            @if (session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{route('time.in')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    @error('username')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="time-in-btn">Time In</button>
            </form>
            <div class="back-link">
                <a href="{{ route('login.page') }}">← Back to Login</a>
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
            --success-green: #28a745;
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

        .container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .time-in-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--dark-blue);
            text-align: center;
            margin: 0 0 1.5rem 0;
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
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--medium-blue);
            box-shadow: 0 0 0 2px rgba(41, 98, 255, 0.1);
        }

        .time-in-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--medium-blue);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .time-in-btn:hover {
            background-color: var(--light-blue);
        }

        .error-message {
            background-color: var(--error-red);
            color: var(--white);
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .success-message {
            background-color: var(--success-green);
            color: var(--white);
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .error {
            color: var(--error-red);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            margin-bottom: 0;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--medium-blue);
            text-decoration: none;
            font-size: 0.9rem;
            transition: opacity 0.3s;
        }

        .back-link a:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .time-in-card {
                padding: 1.5rem;
            }
        }
    </style>
</body>
</html>