<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard
     */
    public function index(Request $request)
    {
        return view('dashboard', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the user profile
     */
    public function profile(Request $request)
    {
        return view('profile', [
            'user' => $request->user(),
        ]);
    }
}
