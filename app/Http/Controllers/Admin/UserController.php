<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 404);

        $users = User::query();

        $users->when(auth()->user()->role_id === User::ADMIN, function ($query) {
            $query->whereNotIn('role_id', [User::SUPER_ADMIN, User::ADMIN]);
        });

        $users->when(!empty($request->search), function ($query) use ($request) {
            $query->where('name', 'LIKE', "{$request->search}%")
                ->orWhere('username', 'LIKE', "{$request->search}%")
                ->orWhere('class', 'LIKE', "{$request->search}%");
        });

        $users = $users->latest()->paginate(36);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
