<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Attendance</title>
</head>
<body>
    <a href="{{route('dashboard')}}">Back</a>
    <div class="page-title-container">
        <H1>Check Attendance</H1>
    </div>
    <div class="employee-profile">
        <div class="employee-profile-title">
            <h2>Employee Profile</h2>
        </div>
        <div class="employee-profile-content">
            <p>Username: {{$employee['username']}}</p>
            <p>Account Type: {{$employee['is_admin'] ? "Admin": "Regular user"}}</p>
            <p>First Name: {{$employee['first_name']}}</p>
            <p>Middle Name: {{$employee['middle_name']}}</p>
            <p>Last Name: {{$employee['last_name']}}</p>
            <p>Department: {{$employee['department']}}</p>
            <p>Position: {{$employee['position']}}</p>
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
                        <td>{{$attendance['attID']}}</td>
                        <td>{{$attendance['time_in'] === null ? "Late": $attendance['time_in']}}</td>
                        <td>{{$attendance['time_out'] === null ? "Overtime" : $attendance['time_out']}}</td>
                        <td>{{$attendance['date']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>