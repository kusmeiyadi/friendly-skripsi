<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Admin;
use DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = Admin::orderBy('created_at', 'DESC')->get();
        return view('admin.user.user', compact('users'));
    }

    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        return view('admin.user.create', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:13',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);

        $user = Admin::firstOrCreate([
            'email' => $request->email
        ], [
            'phone' =>$request->phone,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => true
        ]);

        $user->assignRole($request->role);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Ditambahkan']);
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $role = Role::orderBy('name', 'ASC')->get();
        return view('admin.user.edit', compact('user', 'role'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
        ]);

        $user = Admin::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'name' => $request->name,
            'password' => $password
        ]);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Diperbaharui']);
    }

    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $user->name . '</strong> Dihapus']);
    }

    public function roles(Request $request, $id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('admin.user.roles', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = Admin::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => 'Role Sudah Di Set']);
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');
        $permissions = null;
        $hasPermission = null;

        $roles = Role::all()->pluck('name');

        if (!empty($role)) {
            $getRole = Role::findByName($role);
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();
            $permissions = Permission::all()->pluck('name');
        }
        return view('admin.user.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        $role = Role::findByName($role);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
