<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employee = $this->getUserByUUID($user['uuid']);

        return view('attendance', compact('employee'));
    }
    public function getUserByUUID($uuid): array
    {
        $data = User::with('attendance')->where('uuid', $uuid)->first()->toArray();
        return $data;
    }
    public function timeInIndex()
    {
        return view('timeIn');
    }
    public function timeIn(Request $request)
    {
        $request->validate([
            'username' => 'required|string'
        ]);

        $user = User::where('username', $request->username)
            ->where('is_deleted', false)
            ->first();

        if (!$user) {
            return redirect()->route('login.page')
                ->with('error', 'Invalid Time IN. Username not found');
        }

        $attID = $this->generateATTID();

        if ($user->uuid !== null) {
            attendance::create([
                'uuid' => $user->uuid,
                'attID' => $attID,
                'time_in' => Carbon::now()->format('H:i:s'),
                'date' => Carbon::now()->format('Y-m-d'),
                'is_deleted' => false,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }


        return redirect()->route('login.page')
            ->with('success', 'Time In, successfully recorded.');
    }
    public function timeOutIndex()
    {
        return view('timeOut');
    }
    public function timeOut(Request $request)
    {
        $request->validate([
            'username' => 'required|string'
        ]);

        $user = User::where('username', $request->username)
            ->where('is_deleted', false)
            ->first();

        if (!$user) {
            return redirect()->route('login.page')
                ->with('error', 'Invalid Time IN. Username not found');
        }
        $date = Carbon::now()->format('Y-m-d');
        $attendance = attendance::where('uuid', $user->uuid)
            ->where('date', $date)
            ->where('is_deleted', false)
            ->first();
        if (!$attendance) {
            return redirect()->route('login.page')
                ->with('error', 'Invalid Time OUT. No record found for today.');
        }
        attendance::where('attID', $attendance['attID'])->where('time_out', null)->update([
            'time_out' => Carbon::now()->format('H:i:s'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->route('login.page')
            ->with('success', 'Time Out, successfully recorded.');
    }
    public function generateATTID()
    {
        do {
            $prefix = 'ATT';

            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $randomPart = '';

            for ($i = 0; $i < 12; $i++) {
                $randomPart .= $characters[rand(0, strlen($characters) - 1)];
            }

            $attID = $prefix . $randomPart;

            $exists = attendance::where('attID', $attID)->first();
        } while ($exists !== null);

        return $attID;
    }
}
