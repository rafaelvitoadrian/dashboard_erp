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
        $name_user = $user['name'];
        $email_user = $user['email'];
        $status_user = $user['status'];
        $api_token_user = $user['api_token'];
        $user_profile = 'http://127.0.0.1:8000/storage/'.$user['image'];
        $permissions = Role::with('permissions:name')->find($user);
//        $user_role = User::with('roles:name','roles.permissions')->find($user);
//        $test = User::with('roles')->
//        $role =  User::with('role')->find($id);
//        $role = $request->role();

        return response()->json([
            'pesan' => 'Successfull Login',
            'data' => [
                'name' => $name_user,
                'email' => $email_user,
                'status' => $status_user,
                'api_token'=>$api_token_user,
                'profile_picture' => $user_profile,
                'role' => $permissions
            ],
        ],200);
    }
}
