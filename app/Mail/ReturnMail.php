<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReturnMail extends Mailable
{
  use Queueable, SerializesModels;

  public $email;

  public function __construct($email)
  {
    $this->email = $email;
  }

  public function build()
  {
    return $this->view('returnMailer')
      ->subject('Thank you for contacting me!');
  }
}
