<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminProfileController extends Controller
{
    public function index(): View
    {
        return view('admin.user-profile');
    }
    public function updateChange(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
            'min:8', // Password rule
            'password_confirmation' => 'required|string|min:8',
            'old_password' => 'required|string|min:8',
        ]);
        $user = Auth::user();

        $checked = Hash::check($request->password, $user->password);
        if (!$checked) {
            return redirect()->back()->with('error', 'Old Password is wrong');
        }
        $user->update([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Password changed successfully');
    }
}
