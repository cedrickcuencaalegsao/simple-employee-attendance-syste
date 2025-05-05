<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(): View
    {
        $employees = $this->getAllUsers();
        return view('dashboard', compact("employees"));
    }
    public function addNewEmployeeIndex(): View
    {
        return view('addEmployee');
    }
    public function checkAttendanceIndex($uuid): View
    {
        $employee = $this->getUserByUUID($uuid);
        return view('checkattendance', compact("employee"));
    }
    public function editEmployee(string $uuid): View
    {
        $data = User::where('uuid', $uuid)->first();
        return view('editEmployee', compact("data"));
    }
    public function saveEditEmploye(Request $request)
    {



        $request->validate([
            'uuid' => 'required|string|exists:users,uuid',
            'username' => 'required|string',
            'email' => 'required|email',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'department' => 'required|string',
            'position' => 'required|string',
        ]);

        $user = User::where('uuid', $request->uuid)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if (!Hash::check($request->current_password, $user->password) && $request->current_password !== null) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        User::where('uuid', $request->uuid)->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'department' => $request->department,
            'position' => $request->position,
            'password' => Hash::make($request->new_password),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('dashboard')->with('success', 'Employee updated successfully');
    }
    public function saveNewEmployee(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'is_admin' => 'required'
        ]);
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password and confirmation do not match');
        }
        User::create([
            'uuid' => $this->generateUUID(),
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department' => $request->department,
            'position' => $request->position,
            'is_admin' => $request->is_admin !== 0 ? false : true,
            'is_deleted' => false,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->route('dashboard')->with('success', 'Employee added successfully');
    }
    public function generateUUID()
    {
        do {
            $prefix = 'USR';

            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $randomPart = '';

            for ($i = 0; $i < 12; $i++) {
                $randomPart .= $characters[rand(0, strlen($characters) - 1)];
            }

            $uuID = $prefix . $randomPart;

            $exists = User::where('uuid', $uuID)->first();
        } while ($exists !== null);

        return $uuID;
    }
    public function getAllUsers(): array
    {
        $data = User::with('attendance')->get()->toArray();
        return $data;
    }
    public function getUserByUUID($uuid): array
    {
        $data = User::with('attendance')->where('uuid', $uuid)->first()->toArray();
        return $data;
    }
}
