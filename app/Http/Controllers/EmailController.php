<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
     
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');

 
        // Mail::to('turelyk.as@gmail.com')->send(new WelcomeEmail($firstName, $lastName, $email, $phone, $message));

        // return response()->json(['message' => 'Email sent successfully']);
        return redirect('/');
    }
}
