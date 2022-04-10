<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|string',
            'body' => 'required',
            'from' => 'required|email',
            'sender_name' => 'required',
            'file' => 'required'
        ]);

        //return new SendMail($request);

        Mail::to($request->email)->send(new SendMail($request));

        session()->flash('success', 'Email Sent Successfully!');
        
        return redirect('/');
    }
}
