<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $users = User::with('votes')->whereNotIn('role_id', [User::SUPER_ADMIN, User::ADMIN])->paginate(36);

        return view('admin.votes.index', compact('users'));
    }
}
