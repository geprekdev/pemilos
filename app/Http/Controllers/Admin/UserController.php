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
            $query->where('name', 'LIKE', "%{$request->search}%")
                ->orWhere('username', 'LIKE', "%{$request->search}%")
                ->orWhere('class', 'LIKE', "%{$request->search}%");
        });

        $users = $users->latest('id')->paginate(36);

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

    public function edit(User $user)
    {
        abort_if(
            (!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]) || $user->role_id === User::SUPER_ADMIN)
                || (auth()->user()->role_id === User::ADMIN && $user->role_id === User::ADMIN),
            404
        );

        $roles = [
            User::STUDENT => 'Murid',
            User::TEACHER => 'Guru',
            User::STAFF => 'Staff',
        ];

        if (auth()->user()->role_id === User::SUPER_ADMIN) {
            $roles[User::ADMIN] = 'Administrator';
        }

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        abort_if(
            (!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]) || $user->role_id === User::SUPER_ADMIN)
                || (auth()->user()->role_id === User::ADMIN && $user->role_id === User::ADMIN),
            404
        );

        $roleMin = auth()->user()->role_id === User::SUPER_ADMIN
            ? User::ADMIN
            : User::STUDENT;
        $roleMax = User::STAFF;

        $data = $request->validate([
            'name' => ['required', 'string'],
            'role_id' => ['required', 'numeric', "min:{$roleMin}", "max:{$roleMax}"],
        ]);

        $data['class'] = null;
        if ((int) $data['role_id'] === User::STUDENT) {
            $class = $request->validate([
                'class' => ['required', 'string'],
            ]);

            $data['class'] = $class['class'];
        }

        $user->update($data);

        return redirect(route('admin.users.index'))->with('success', 'Berhasil mengedit user.');
    }

    public function destroy($id)
    {
        //
    }
}
