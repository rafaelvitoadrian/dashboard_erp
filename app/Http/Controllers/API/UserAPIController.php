<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Auth;

class UserAPIController extends Controller
{
    public function SumActiveUser()
    {
        $data = User::where('status','active')->count();
        Auth::login();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
