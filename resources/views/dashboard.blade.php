<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="navBar">
        <h1 class="title">Attendance Admin Pannel</h1>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <a href="{{ route('add.employee') }}">Add Employee</a>
        </div>
    </div>
    @if (session('success'))
        <div class="success-message">
            {{ session('Success') }}
        </div>
    @endif
    <div class="table-container">
        <div class="table-title">
            <h1>Employee List Table</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Account Type</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee['username'] }}</td>
                        <td>{{ $employee['is_admin'] ? 'Admin' : 'Regular user' }}</td>
                        <td>{{ $employee['first_name'] }}</td>
                        <td>{{ $employee['middle_name'] }}</td>
                        <td>{{ $employee['last_name'] }}</td>
                        <td>{{ $employee['department'] }}</td>
                        <td>{{ $employee['position'] }}</td>
                        <td>
                            <a href="{{ route('check.attendance', [$employee['uuid']]) }}">Check Attendance</a>
                            <a href="#">Edit</a>
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<style>
    :root {
        --dark-blue: #1a237e;
        --medium-blue: #283593;
        --light-blue: #3949ab;
        --white: #ffffff;
        --gray: #f5f5f5;
        --text-gray: #757575;
    }

    body {
        margin: 0;
        padding-top: 80px; /* Add padding to account for fixed navbar height */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--gray);
    }

    .navBar {
        background-color: var(--dark-blue);
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: fixed; /* Make navbar fixed */
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000; /* Ensure navbar stays on top */
    }

    .title {
        color: var(--white);
        margin: 0;
        font-size: 1.5rem;
    }

    .navBar div {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .navBar button,
    .navBar a {
        background-color: var(--medium-blue);
        color: var(--white);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .navBar button:hover,
    .navBar a:hover {
        background-color: var(--light-blue);
    }

    .table-container {
        margin: 2rem;
        background-color: var(--white);
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1rem;
    }

    .table-title h1 {
        color: var(--dark-blue);
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--medium-blue);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    thead tr {
        background-color: var(--dark-blue);
        color: var(--white);
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    tbody tr:hover {
        background-color: var(--gray);
    }

    td a {
        color: var(--medium-blue);
        text-decoration: none;
        margin-right: 1rem;
    }

    td a:hover {
        color: var(--light-blue);
        text-decoration: underline;
    }

    td form {
        display: inline;
    }

    td button {
        background-color: #dc3545;
        color: var(--white);
        border: none;
        padding: 0.3rem 0.8rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    td button:hover {
        background-color: #c82333;
    }

    .success-message {
        background-color: #28a745;
        color: var(--white);
        padding: 1rem;
        margin: 1rem 2rem;
        border-radius: 4px;
        text-align: center;
    }
    
    @media (max-width: 768px) {
        body {
            padding-top: 100px; /* Increase padding for mobile */
        }

        .navBar {
            padding: 1rem;
        }
    }
</style>

</html>
