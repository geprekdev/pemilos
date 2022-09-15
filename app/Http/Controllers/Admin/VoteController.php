<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 404);

        $users = User::with('votes')->whereNotIn('role_id', [User::SUPER_ADMIN, User::ADMIN]);

        $users->when(!empty($request->search), function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->search}%")
                ->orWhere('username', 'LIKE', "%{$request->search}%")
                ->orWhere('class', 'LIKE', "%{$request->search}%");
        });

        $users = $users->orderBy('class')->orderBy('name')->paginate(36);

        return view('admin.votes.index', compact('users'));
    }
}
