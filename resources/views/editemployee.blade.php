<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar-content">
            <a href="{{route('dashboard')}}" class="back-button">← Back to Dashboard</a>
            <h1>Edit Employee</h1>
        </div>
    </div>

    <div class="form-container">
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

        <form action="{{route('save.edit.employee')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="uuid">UUID:</label>
                <input type="text" id="uuid" name="uuid" value="{{$data['uuid']}}" readonly>
                @error('uuid')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="{{$data['username']}}">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{$data['email']}}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="{{$data['first_name']}}">
                    @error('first_name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" value="{{$data['middle_name']}}">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="{{$data['last_name']}}">
                    @error('last_name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="is_admin">Account Type:</label>
                    <select name="is_admin" id="is_admin">
                        <option value="0">Regular User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="department">Department:</label>
                    <select name="department" id="department">
                        <option value="it">IT</option>
                        <option value="finance">Finance</option>
                        <option value="hr">Human Resource</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="position">Position:</label>
                    <select name="position" id="position">
                        <option value="admin">Admin</option>
                        <option value="hr">HR</option>
                        <option value="developer">Developer</option>
                        <option value="manager">Manager</option>
                        <option value="staff">Staff</option>
                        <option value="intern">Intern</option>
                    </select>
                </div>
            </div>

            <div class="password-container">
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" name="current_password" id="current_password">
                    @error('current_password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password">
                    @error('new_password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                    @error('confirm_password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="submit-btn">Save Changes</button>
        </form>
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
            padding-top: 80px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--gray);
        }

        .navbar {
            background-color: var(--dark-blue);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            color: var(--white);
        }

        .navbar-content {
            display: flex;
            align-items: center;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .back-button {
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: opacity 0.3s;
        }

        .back-button:hover {
            opacity: 0.8;
        }

        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .error-message {
            background-color: var(--error-red);
            color: var(--white);
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .success-message {
            background-color: var(--success-green);
            color: var(--white);
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .error {
            color: var(--error-red);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        input, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--medium-blue);
            box-shadow: 0 0 0 2px rgba(41, 98, 255, 0.1);
        }

        .submit-btn {
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

        .submit-btn:hover {
            background-color: var(--light-blue);
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }

            .form-container {
                margin: 1rem;
                padding: 1rem;
            }
        }
    </style>
</body>
</html>