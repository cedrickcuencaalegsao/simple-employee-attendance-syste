<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OTPController extends Controller
{
    public function viewSentOTP()
    {
        return view('forgetpass');
    }

    public function sendOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            // Generate 6-digit OTP
            $otp = rand(100000, 999999);

            // Store OTP in session testing rani lagi sa production
            session(['otp' => $otp, 'otp_email' => $request->email]);

            // Send OTP via email
            Mail::to($request->email)->send(new OTPMail($otp));

            return response()->json([
                'success' => true,
                'message' => 'OTP sent to your email!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.',
            ], 500);
        }
    }

    public function viewVerifyOTP()
    {
        if (! session('otp_email')) {
            return redirect()->route('password.request')
                ->with('error', 'Please request an OTP first.');
        }

        return view('verifyPasswordOTP');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        $sessionOTP = session('otp');
        $sessionEmail = session('otp_email');

        if (! $sessionOTP || ! $sessionEmail) {
            return redirect()->back()->with('message', 'OTP session expired. Please request a new OTP.');
        }

        if ($request->otp == $sessionOTP) {
            session()->forget('otp');

            return redirect()->route('show.update.password')->with('email', $sessionEmail);

        }

        return redirect()->back()->with('message', 'Invalid OTP code. Please try again.');

    }
}
