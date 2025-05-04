<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
</head>

<body>
    <div class="navbar">
        <a href="{{ route('dashboard') }}" class="back-button">← Back to Dashboard</a>
        <h1>Add New Employee</h1>
    </div>

    <div class="form-container">
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <form action="{{ route('add.employee') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                @error('username')
                    <p class="error">Username is required.</p>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name">
                    @error('first_name')
                        <p class="error">First name is required.</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name">
                    @error('last_name')
                        <p class="error">Last name is required.</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                @error('email')
                    <p class="error">Email is required.</p>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    @error('password')
                        <p class="error">Password is required.</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <p class="error">Password Confirmation is required.</p>
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

            <button type="submit" class="submit-btn">Add Employee</button>
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
        }

        body {
            margin: 0;
            padding-top: 80px;
            /* Add padding to account for fixed navbar */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--gray);
        }

        .navbar {
            background-color: var(--dark-blue);
            padding: 1rem 2rem;
            color: var(--white);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .back-button {
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
            margin-bottom: 0.5rem;
            transition: opacity 0.3s;
        }

        .back-button:hover {
            opacity: 0.8;
        }


        .back-button {
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
            width: 100%;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
            font-weight: 500;
        }

        input,
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--medium-blue);
            box-shadow: 0 0 0 2px rgba(41, 98, 255, 0.1);
        }

        .error {
            color: var(--error-red);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .error-message {
            background-color: var(--error-red);
            color: var(--white);
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .submit-btn {
            background-color: var(--medium-blue);
            color: var(--white);
            border: none;
            padding: 1rem 2rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: var(--light-blue);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M8 12L2 6h12l-6 6z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 100px;
                /* Increase padding for mobile */
            }

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
