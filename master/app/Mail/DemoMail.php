<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\View;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $viewName; // Add a property to store the view name

    public function __construct($mailData, $viewName)
    {
        $this->mailData = (object) $mailData;
        $this->viewName = $viewName; // Assign the view name
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Shaghenli',
        );
    }

    public function build()
    {
        return $this->view('emails.'.$this->viewName)
                    ->with(['mailData' => $this->mailData]);
    }

    public function attachments(): array
    {
        return [];
    }
}
