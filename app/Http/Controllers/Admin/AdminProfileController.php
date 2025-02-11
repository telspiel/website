<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index() : View {
        return view('admin.user-profile');
    }
    public function updateChange(Request $request) : View {
        
        return view('admin.user-profile');
    }
}
