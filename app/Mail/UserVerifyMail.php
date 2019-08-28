<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $direccion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;
        $this->direccion = env('HOST_FRONT', "http://localhost:3000")."/verificarCorreo/$token";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('supertopo002@gmail.com')->view('emails.emailVerificacion');
    }
}
