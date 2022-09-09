<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->role_id !== User::ADMIN, 404);

        return view('admin.dashboard');
    }
}
