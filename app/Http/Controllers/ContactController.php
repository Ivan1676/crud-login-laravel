<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Replace this with the user's email or any other recipient
        $toEmail = 'ivan.mosteo.zrg@gmail.com';

        try {
            Mail::to($toEmail)->send(new ContactFormMail($subject, $message));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }
}

