<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     *
     *  Display a listing of roles.
     *
     *  - If logged-in user is superadmin, show all roles
     *  - Otherwise, hide superadmin role
     *  - Load system settings
     *  - Send roles, settings, and user data to view
     */

    public function index()
    {
        $roles = Role::query()->where('name', '!=', 'superadmin')->get();

        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $user = Auth::user();

        return view('admin.roles.index', compact('roles','settings','user'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create(): View
    {


        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $user = Auth::user();
        $auth_user = Auth::user();
        if ($auth_user->hasRole('superadmin')) {
            $permission = Permission::get();
        } else {
            $permission = Permission::whereNotIn('name', ['page-list', 'page-create', 'page-edit', 'page-delete', 'page-content-create', 'page-content-delete'])->get();
        }
        return view('admin.roles.create',compact('permission','settings','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        Role::create(['name' => $request->input('name')]);

        $newRole = Role::findByName($request->input('name'));
        foreach ($request->input('permission') as $key => $value) {
            $permissionName = Permission::findById($value);
            $newRole->givePermissionTo($permissionName->name);
        }

        return redirect()
            ->route('dashboard.role.index')
            ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {



        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $user = Auth::user();

        $auth_user = Auth::user();
        $role = Role::findorfail($id);

        if ($role->name === 'superadmin' && !$auth_user->hasRole('superadmin')) {
            return redirect()->route('role.index');
        }

        if ($auth_user->hasRole('superadmin')) {
            $permission = Permission::all();
        } else {
            $permission = Permission::whereNotIn('name', ['page-list', 'page-create', 'page-edit', 'page-delete', 'page-content-create', 'page-content-delete'])->get();
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',compact('role','permission','rolePermissions',
            'settings','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        DB::table("role_has_permissions")->where('role_id',$id)->delete();

        $newRole = Role::findByName($request->input('name'));
        foreach ($request->input('permission') as $key => $value) {
            $permissionName = Permission::findById($value);
            $newRole->givePermissionTo($permissionName->name);
        }

        return redirect()->route('dashboard.role.index')
            ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id): RedirectResponse
    // {
    //     DB::table("roles")->where('id',$id)->delete();
    //     return redirect()->route('role.index')
    //                     ->with('success', 'Role deleted successfully');
    // }

    public function destroy($id){
        $role = Role::find($id);
        if ($role->name === 'superadmin' && !Auth::user()->hasRole('superadmin')) {
            return redirect()->route('dashboard.role.index');
        }
        $role->delete();
        return redirect()->route('dashboard.role.index')
            ->with('success', 'Role deleted successfully');
    }
}
