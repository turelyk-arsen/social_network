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

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'messText' => 'required',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $messText = $request->input('messText');


        Mail::to('find.your.junior.mail@gmail.com')->send(new WelcomeEmail($firstName, $lastName, $email, $phone, $messText));

        // return response()->json(['message' => 'Email sent successfully']);
        // return redirect('/');
        return redirect()->back()->with('success', 'Message send!');
    }
}