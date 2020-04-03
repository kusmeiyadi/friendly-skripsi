<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
      // Role::create(['name'=>'writer']);
      // $permission = Permission::create(['name'=>'edit post']);
      // $role = Role::findById(1);
      // $permission = Permission::findById(1);
      // $role->givePermissionTo($permission);
      // $permission->removeRole($role);
      // $role->revokePermissionTo($permission);
      // return auth()->user()->revokePermissionTo('edit post');
      // return auth()->user()->removeRole('writer');
      // auth()->user()->givePermissionTo('edi t post');
      // auth()->user()->assignRole('writer');
      // return  auth()->user()->permissions;
      // return Admin::permission('write post')->get();
      return view('admin.home');
    }
}
