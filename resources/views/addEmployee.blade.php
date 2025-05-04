<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('dashboard') }}">Back</a>
    <h1>New Employee</h1>
    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif
    <form action="{{ route('add.employee') }}" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        @error('username')
            <p style="color:red">Username is required.</p>
        @enderror
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br>
        @error('first_name')
            <p style="color:red">First name is required.</p>
        @enderror
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name"><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br>
        @error('last_name')
            <p style="color:red">Last name is required.</p>
        @enderror
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>
        @error('email')
            <p style="color:red">Email is required.</p>
        @enderror
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        @error('password')
            <p style="color:red">Password is required.</p>
        @enderror
        <label for="password">Conform Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>
        @error('password_confirmation')
            <p style="color:red">Password Confirmation is required.</p>
        @enderror
        <label for="is_admin">Account Type:</label>
        <select name="is_admin" id="is_admin">
            <option value="0">Regular User</option>
            <option value="1">Admin</option>
        </select><br>
        <label for="department">Department:</label>
        <select name="department" id="department">
            <option value="it">IT</option>
            <option value="finance">Finance</option>
            <option value="hr">Human Resource</option>
        </select>
        <br>
        <label for="position">Position:</label>
        <select name="position" id="position">
            <option value="admin">Admin</option>
            <option value="hr">HR</option>
            <option value="developer">Developer</option>
            <option value="manager">Manager</option>
            <option value="staff">Staff</option>
            <option value="intern">Intern</option>
        </select>
        <br>
        <button type="submit">Add User</button>
    </form>
</body>

</html>
