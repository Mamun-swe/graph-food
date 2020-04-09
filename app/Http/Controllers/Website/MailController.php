<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;

class MailController extends Controller
{
    public function sendMessage(Request $request) {

        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|string|email|max:255',
            'message' => 'required',
        ]);

        $form_data = array(
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'message'=> $request->message,
        );

        dd($form_data);
     
        Mail::send(['text'=>'mail'], $form_data, function($message) {
           $message->to('grapview.com@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        // echo "Basic Email Sent. Check your inbox.";
     }
}
