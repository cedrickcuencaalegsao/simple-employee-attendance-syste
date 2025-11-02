<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
</head>

<body>
    <div class="update-container">
        <div class="update-card">
            <h1>Update Password</h1>
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ session('otp_email') }}">
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <div class="password-input-wrapper">
                        <input type="password" name="new_password" id="new_password" required minlength="6">
                        <span class="toggle-password" onclick="togglePassword('new_password', this)">&#128065;</span>
                    </div>
                    @error('new_password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm_password">Retype New Password</label>
                    <div class="password-input-wrapper">
                        <input type="password" name="confirm_password" id="confirm_password" required minlength="6">
                        <span class="toggle-password"
                            onclick="togglePassword('confirm_password', this)">&#128065;</span>
                    </div>
                    @error('confirm_password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="update-btn">Update Password</button>
            </form>
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

        .update-container {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }

        .update-card {
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

        .password-input-wrapper {
            position: relative;
        }

        input[type="password"] {
            width: 100%;
            padding: 0.75rem 2.5rem 0.75rem 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--medium-blue);
            user-select: none;
        }

        .toggle-password.active {
            color: var(--light-blue);
        }

        .update-btn {
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

        .update-btn:hover {
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

        @media (max-width: 480px) {
            .update-container {
                padding: 1rem;
            }

            .update-card {
                padding: 1.5rem;
            }
        }
    </style>
    <script>
        function togglePassword(fieldId, icon) {
            const input = document.getElementById(fieldId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.add('active');
            } else {
                input.type = 'password';
                icon.classList.remove('active');
            }
        }
    </script>
</body>

</html>
