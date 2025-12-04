<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name'     => $request->name,
            'email'    => $request->email,
            'user_msg' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($mail) {
            $mail->to('asepsurya1998@gmail.com')
                ->subject('Kontak Baru dari Website');
        });

        return back()->with('success', 'Message sent successfully!');
    }
}
