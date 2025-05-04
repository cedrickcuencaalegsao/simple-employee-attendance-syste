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
            <a href="{{route('add.employee')}}">Add Employee</a>
        </div>
    </div>
    @if (session('success'))
        <p style="color:green">{{ session('Success') }}</p>
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
                        <td>{{$employee['username']}}</td>
                        <td>{{$employee['is_admin'] ? "Admin": "Regular user"}}</td>
                        <td>{{$employee['first_name']}}</td>
                        <td>{{$employee['middle_name']}}</td>
                        <td>{{$employee['last_name']}}</td>
                        <td>{{$employee['department']}}</td>
                        <td>{{$employee['position']}}</td>
                        <td>
                            <a href="{{route('check.attendance',[$employee['uuid']])}}">Check Attendance</a>
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

</html>
