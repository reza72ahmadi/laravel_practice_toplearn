<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RoleRequest;
use App\Models\User\Permission;
use App\Models\User\Role;

class RoleController extends Controller
{
    
     //listing 
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.user.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.user.role.create', compact('permissions'));
    }


    // Store 

    public function store(RoleRequest $request)
    {

        $inputs = $request->all();
        $role = Role::create($request->validated());
        $inputs['permissions'] =   $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);

        return redirect()->route('admin.user.role.index')
            ->with('swal-success', 'نقش شما با موفقیت ایجاد شد');
    }

    //Edit
    public function edit(Role $role)
    {

        return view('admin.user.role.edit', compact('role'));
    }


    // Update 

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return redirect()->route('admin.user.role.index')
            ->with('swal-success', 'نقش شما با موفقیت ویرایش شد');
    }

    // Remove

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.user.role.index')
            ->with('swal-success', 'نقش شما با موفقیت حذف شد');
    }

    // permissionForm
    public function permissionForm(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.user.role.permission-form', compact('permissions', 'role'));
    }

    // permissionUpdate 
    public function permissionUpdate(RoleRequest $request, Role $role)
    {
        $inputs = $request->all();
        $inputs['permissions'] =   $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);

        return redirect()->route('admin.user.role.index')
            ->with('swal-success', 'نقش شما با موفقیت ویرایش شد');
    }

    // status
    // public function status(Role $role)
    // {
    //     $role->status = $role->status == 0 ? 1 : 0;
    //     $result =  $role->save();

    //     if ($result) {
    //         if ($role->status == 0) {
    //             return response()->json(['status' => true, 'checked' => false]);
    //         } else {
    //             return response()->json(['status' => true, 'checked' => true]);
    //         }
    //     } else {
    //         return response()->json(['status' => false]);
    //     }
    // }
}
