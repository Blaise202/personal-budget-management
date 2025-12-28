<?php

namespace App\Http\Controllers;

use App\Mail\ReturnMail;
use App\Mail\SendEmail;
use App\Models\Email;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class EmailController extends Controller
{
  public function emails()
  {
    $emails = Email::orderBy('created_at', 'desc')->get();
    return view('emails.index', compact('emails'));
  }

  public function sendEmail(Request $request)
  {
    $vaildator = FacadesValidator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'subject' => 'sometimes',
      'message' => 'required|string',
    ]);

    if ($vaildator->fails()) {
      dd($vaildator->errors());
      return redirect()->back()->withErrors($vaildator)->withInput();
    }

    $email = Email::create([
      'name' => $request->name,
      'email' => $request->email,
      'subject' => $request->subject,
      'message' => $request->message,
    ]);

    Mail::to('izerimanab74@gmail.com')->send(new SendEmail($email));
    Mail::to('blaise.izerimana@ashesi.edu.gh')->send(new SendEmail($email));
    Mail::to($request->email)->send(new ReturnMail($email));

    return redirect()->back()->with('success', 'Email sent successfully!');
  }
}
