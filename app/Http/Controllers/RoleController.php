<?php

namespace App\Http\Controllers;

use App\Tables\Roles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' =>  Roles::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(Permission::pluck('name')->toArray());

        // return view('admin.roles.create');
        return view('admin.roles.create', [
            'permissions'   =>  Permission::pluck('name')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        // dd($request);
        $role = Role::create($request->validated());
        $role->syncPermissions($request->permissions);
        Splade::toast('Role Has Been Created!')->autoDismiss(3);

        return to_route('admin.roles.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role'  => $role,
            'permissions'   =>  Permission::pluck('name')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->syncPermissions($request->permissions);
        Splade::toast('Role Has Been Updated!')->autoDismiss(3);

        return to_route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Splade::toast('Role Has Been Deleted')
        ->danger()
        ->autoDismiss(3);

        return back();
    }
}
