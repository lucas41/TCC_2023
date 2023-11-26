<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Delete extends Mailable
{
    use Queueable, SerializesModels;

  
    /**
     * Crie uma nova instância do Mailable.
     *
     * @return void
     */
    public function __construct($conjuntoAleatorio)
    {
        $this->conjuntoAleatorio = $conjuntoAleatorio;
    }

    /**
     * Construa a mensagem.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email de Reset password')
                     ->view('emails.Delete')->with(['conjuntoAleatorio' => $this->conjuntoAleatorio]);
    }
}
