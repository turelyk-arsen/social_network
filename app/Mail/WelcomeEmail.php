<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
 
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $message;
    /**
     * Create a new message instance.
     */
    public function __construct($firstName, $lastName, $email, $phone, $message)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.welcome')
                    ->subject('Welcome Email')
                    ->with([
                        'firstName' => $this->firstName,
                        'lastName' => $this->lastName,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'message' => $this->message,
                    ]);
    }
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Welcome Email',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
