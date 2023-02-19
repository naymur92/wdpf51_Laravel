<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
  public function index()
  {
    Mail::to('naymur92@gmail.com')->send(new DemoMail());

    dd("Email is sent successfully.");
  }

  public function contactForm()
  {
    return view('contact');
  }

  public function sendMessage(Request $request)
  {
    Mail::to('naymur92@gmail.com')->send(new ContactMail($request->only('email', 'name', 'message')));

    return back()->with('msg', 'Message Send Successfully');
  }
}
