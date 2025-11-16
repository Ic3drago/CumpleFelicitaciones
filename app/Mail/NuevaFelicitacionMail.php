<?php

namespace App\Mail;

use App\Models\Congratulation; // <-- 1. Importa tu modelo
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaFelicitacionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * La instancia de la felicitación.
     *
     * @var \App\Models\Congratulation
     */
    public $felicitacion; // <-- 2. Propiedad pública para guardar los datos

    /**
     * Crea una nueva instancia del mensaje.
     *
     * @param \App\Models\Congratulation $felicitacion
     * @return void
     */
    public function __construct(Congratulation $felicitacion) // <-- 3. Recibe el modelo
    {
        // 4. Guarda la felicitación para usarla en la vista
        $this->felicitacion = $felicitacion;
    }

    /**
     * Define el "sobre" del mensaje (Asunto).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Nueva Felicitación para Ninel!', // <-- Asunto corregido
        );
    }

    /**
     * Define el contenido del mensaje (la plantilla/vista).
     */
    public function content(): Content
    {
        return new Content(
            // 5. Apunta a la vista correcta dentro de 'resources/views/emails/'
            view: 'emails.nueva-felicitacion', 
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
