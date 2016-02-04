<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Auth;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    //Contact Form
    public function getContactUsForm(Request $request){

        //Get all the data and store it inside Store Variable
        $data=$request->all();

        //Validation rules
        $rules = array (
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:5'
        );

        //Validate data
        $validator  = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){
            //Send email using Laravel send function
            Mail::send('emails.message', $data, function($message) use ($data)
            {
//email 'From' field: Get users email add and name
                $message->from($data['email'] , $data['name']);
//email 'To' field: cahnge this to emails that you want to be notified.
                //$message->to('alumni.cse.buet@gmail.com', 'my name')->cc('me@gmail.com')->subject($data['subject']);
                $message->to('ayanelectric1@gmail.com', 'my name')->subject($data['subject']);
            });
            return redirect('contact_success');
        }else{
//return contact form with errors
            return redirect('contact')->withErrors($validator);
        }
    }
    public function success()
    {
        return view('emails.success');
    }

}
