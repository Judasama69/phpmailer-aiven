<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;

class PHPMailerController extends Controller
{
    public function send(Request $request)
    {
        try {
            Mail::to($request->email)->send(
                new SampleMail($request->message, auth()->user()->email)
            );

            return back()->with('success', 'Message has been sent using Laravel Mail!');
        } catch (\Exception $e) {
            return back()->with('error', "Message could not be sent. Error: {$e->getMessage()}");
        }
    }
}
