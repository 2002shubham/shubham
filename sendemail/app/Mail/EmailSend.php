<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $fileName;
    public function __construct($data, $fileName)
    {
        $this->data = $data;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Email Send With Attachments',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mailcontent',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */

    //  This code is only used when there are only one attachments send.
    public function attachments()
    {
        $attachmment = [];
        if($this->fileName){
            $attachment=[
                Attachment::frompath(public_path('Attachments').'/'.$this->fileName)
            ];
        }
        return $attachment;
    }

    // This code is only used when there are multiple attachments send.

    // public function attachments()
    // {
    //     $attachments = [];

    //     if ($this->fileName) {
    //         foreach ($this->fileName as $file) {
    //             $attachments[] = Attachment::fromPath(public_path('Attachments') . '/' . $file);
    //         }
    //     }
    //     return $attachments;
    // }
}
