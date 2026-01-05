<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Role check: only admins
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        return view('admin.dashboard');
    }
}