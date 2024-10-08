<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Appointment;




class AppointmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $appointment;
    
   
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
     
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Confirmation Mail',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.appointment_confirmation',
            with: ['appointment' => $this->appointment] 
        
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
