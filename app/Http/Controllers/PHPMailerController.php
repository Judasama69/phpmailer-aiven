<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PHPMailerController extends Controller
{
    public function send(Request $request)
    {
        try {
            Mail::to($request->email)->send(
                new SampleMail($request->message, $request->sender_email)
            );

            return back()->with('success', 'Message has been sent using Laravel Mail!');
        } catch (\Exception $e) {
            return back()->with('error', "Message could not be sent. Error: {$e->getMessage()}");
        }
    }
}
