<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('permision:ver-rol|crear-rol|editar-rol|borrar-rol')->only('index');
//        $this->middleware('permision:crear-rol')->only('create', 'store');
//        $this->middleware('permision:editar-rol')->only('edit', 'update');
//        $this->middleware('permision:borrar-rol')->only('destroy');
    }


    public function index()
    {
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles',
            'permissions' => 'required'
        ],
            [
                'permissions.required' => 'El rol debe tener al menos un permiso.'
            ]
        );
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }


    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions;
        return view('roles.show', compact('role', 'rolePermissions'));
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermission = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.edit', compact('role', 'permissions', 'rolePermission'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name, ' .$id,
            'permissions' => 'required',
        ],
            [
                'permissions.required' => 'El rol debe tener al menos un permiso.'
            ]
        );

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
