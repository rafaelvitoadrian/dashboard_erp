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
        $user = $request->user();
        $user_name = $user['name'];
        $user_email = $user['email'];
        $user_gender = $user['gender'];
        $user_status = $user['status'];
        $user_image = 'http://127.0.0.1:8000/storage/'.$user['image'];
        $user_api_token = $user['api_token'];
        $name_role = $user['roles'][0]['name'];
        $permissions = $user['permissions'];

        $data_user = [
            'name' => $user_name,
            'email' => $user_email,
            'gender' => $user_email,
            'status' => $user_status,
            'image' => $user_image,
            'api_token' => $user_api_token,
            'role_user'=>[
                'role_name' => $name_role,
                'role_has_permissions' => $permissions
            ]
        ];
        return response()->json([
            'message' => 'Successfull Login',
            'data' => [
                'user' => $user,
                'test' => $data_user
            ],
        ],200);
    }
}
