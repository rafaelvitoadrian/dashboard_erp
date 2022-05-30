<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
//        $user = User::all();
        $user = $request->user();
        $permissions = Role::with('permissions:name')->find($user);
//        $user_role = User::with('roles:name','roles.permissions')->find($user);
//        $test = User::with('roles')->
//        $role =  User::with('role')->find($id);
//        $role = $request->role();

        return response()->json([
            'pesan' => 'Login Berhasil',
            'data' => [ 'user' => $user,
                'role' => $permissions
            ],
        ],200);
    }
}
