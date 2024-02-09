<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:user','permission:user-list'|'index']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => Users::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
        'permissions'   =>  Permission::pluck('name')->toArray(),
        'roles' => Role::pluck('name')
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user   =   User::create($request->validated());
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        Splade::toast('User Has Been Created')->autoDismiss(3);        

        return to_route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'users' => Users::class,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user'  => $user,
            'permissions'   =>  Permission::pluck('name')->toArray(),
            'roles' => Role::pluck('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        Splade::toast('User has been updated')->autoDismiss(3);

        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Splade::toast('User Has Been Deleted')
            ->danger()
            ->autoDismiss(3);

        return to_route('admin.users.index');
    }
}
