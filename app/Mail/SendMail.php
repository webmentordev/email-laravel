<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data->from, $this->data->subject)->markdown('emails.sendmail', [
            'subject' => $this->data->subject,
            'body' => $this->data->body,
            'from' => $this->data->from,
            'sender_name' => $this->data->sender_name,
        ])->attach($this->data->file, [
            'as' => $this->data->file->getClientOriginalName(),
            'mime' => 'application/pdf',
        ]);
    }
}