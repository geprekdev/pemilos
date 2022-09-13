<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use LogicException;

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
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 404);

        $roles = [
            User::STUDENT => 'Murid',
            User::TEACHER => 'Guru',
            User::STAFF => 'Staff',
        ];

        if (auth()->user()->role_id === User::SUPER_ADMIN) {
            $roles[User::ADMIN] = 'Administrator';
        }

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 404);

        $roleMin = auth()->user()->role_id === User::SUPER_ADMIN
            ? User::ADMIN
            : User::STUDENT;
        $roleMax = User::STAFF;

        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users,username'],
            'role_id' => ['required', 'numeric', "min:{$roleMin}", "max:{$roleMax}"],
        ]);

        $credentials['class'] = null;
        if ((int) $credentials['role_id'] === User::STUDENT) {
            $class = $request->validate([
                'class' => ['required', 'string'],
            ]);

            $credentials['class'] = $class['class'];
        }

        switch ($credentials['role_id']) {
            case User::ADMIN:
                $credentials['password'] = bcrypt('ADMIN' . $credentials['username']);
                break;
            case User::STUDENT:
                $credentials['password'] = bcrypt('MURID' . $credentials['username']);
                break;
            case User::TEACHER:
                $credentials['password'] = bcrypt('GURU' . $credentials['username']);
                break;
            case User::STAFF:
                $credentials['password'] = bcrypt('STAFF' . $credentials['username']);
                break;
        }

        User::create($credentials);

        return redirect(route('admin.users.index'))->with('success', 'Berhasil menambah user.');
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
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 404);

        $roleMin = auth()->user()->role_id === User::SUPER_ADMIN
            ? User::ADMIN
            : User::STUDENT;
        $roleMax = User::STAFF;

        $data = $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users,username'],
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

    public function destroy(User $user)
    {
        abort_if(
            (!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]) || $user->role_id === User::SUPER_ADMIN)
                || (auth()->user()->role_id === User::ADMIN && $user->role_id === User::ADMIN),
            404
        );

        try {
            $user->delete();
        } catch (LogicException) {
            return back()->withErrors('Pengguna tidak dapat dihapus karena pengguna sudah melakukan vote.');
        }

        return redirect(route('admin.users.index'))->with('success', 'Berhasil menghapus user.');
    }
}
