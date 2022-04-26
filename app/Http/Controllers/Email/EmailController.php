<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function index()
    {
        Mail::to('blokbgtt@gmail.com')->send(new SendEmail);
        return "Berhasil Mengirim Email";
    }
}
