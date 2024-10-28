<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $content = [
            'name' => 'Ini Nama Pengirim',
            'subject' => 'Ini Subject Email',
            'body' => 'Ini adalah isi email yang dikirim dari laravel10',
        ];
        Mail::to('heinrichraditya05@gmail.com')->send (new SendEmail($content));

        return 'Email sent successfully';
    }
}
