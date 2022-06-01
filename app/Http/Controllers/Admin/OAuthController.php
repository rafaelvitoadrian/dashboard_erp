<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    public function index(Request $request)
    {
        $client = $request->user()->clients;
        return view('client', ['clients' => $client]);
    }
}
