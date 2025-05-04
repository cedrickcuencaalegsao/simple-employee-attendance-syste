<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Attendance</title>
</head>

<body>
    <div class="navbar">
        <a href="{{ route('dashboard') }}" class="back-button">← Back to Dashboard</a>
        <h1>Check Attendance</h1>
    </div>
    <div class="content-wrapper">
        <div class="employee-profile">
            <div class="employee-profile-title">
                <h2>Employee Profile</h2>
            </div>
            <div class="employee-profile-content">
                <p><strong>Username:</strong> {{ $employee['username'] }}</p>
                <p><strong>Account Type:</strong> {{ $employee['is_admin'] ? 'Admin' : 'Regular user' }}</p>
                <p><strong>First Name:</strong> {{ $employee['first_name'] }}</p>
                <p><strong>Middle Name:</strong> {{ $employee['middle_name'] }}</p>
                <p><strong>Last Name:</strong> {{ $employee['last_name'] }}</p>
                <p><strong>Department:</strong> {{ $employee['department'] }}</p>
                <p><strong>Position:</strong> {{ $employee['position'] }}</p>
            </div>
        </div>
        <div class="table-container">
            <div class="table-title">
                <h2>Attendance Table</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Attendance ID</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee['attendance'] as $attendance)
                        <tr>
                            <td>{{ $attendance['attID'] }}</td>
                            <td>{{ $attendance['time_in'] === null ? 'Late' : $attendance['time_in'] }}</td>
                            <td>{{ $attendance['time_out'] === null ? 'Overtime' : $attendance['time_out'] }}</td>
                            <td>{{ $attendance['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: var(--white);
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

        .content-wrapper {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .employee-profile {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .employee-profile-title h2 {
            color: var(--dark-blue);
            margin: 0 0 1rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--medium-blue);
        }

        .employee-profile-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .employee-profile-content p {
            margin: 0.5rem 0;
            color: var(--text-gray);
        }

        .employee-profile-content strong {
            color: var(--dark-blue);
        }

        .table-container {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .table-title h2 {
            color: var(--dark-blue);
            margin: 0 0 1.5rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--medium-blue);
        }

        table {
            width: 100%;
            border-collapse: collapse;
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

        @media (max-width: 768px) {
            body {
                padding-top: 100px;
            }

            .navbar {
                padding: 1rem;
            }

            .content-wrapper {
                padding: 1rem;
            }

            .employee-profile-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</body>

</html>
