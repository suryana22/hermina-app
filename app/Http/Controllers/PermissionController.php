<?php

namespace App\Http\Controllers;

use App\Tables\Permissions;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index', [
            'permissions' =>  Permissions::class
        ]);
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(CreatePermissionRequest $request)
    {
        Permission::create($request->validated());

        Splade::toast('Permission Has Been Created!')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        Splade::toast('Role Has Been Updated!')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        Splade::toast('Permission Has Been Deleted')
        ->danger()
        ->autoDismiss(3);

        return back();
    }
}
