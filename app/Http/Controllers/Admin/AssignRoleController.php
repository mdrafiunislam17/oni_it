<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        $roles = Role::query()->select('id', 'name')->get();

        foreach ($users as $user) {
            $user->role = $user->roles->pluck('name')->first();
        }

        return view('admin.assign-role.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request)
    {
        $user = User::query()->where('email', $request->email)->first();
        $user->roles()->detach();
        $user->assignRole($request->role);
        return back()->with('success', 'Role assigned successfully');
    }
}
