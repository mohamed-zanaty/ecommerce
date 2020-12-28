<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminReset extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    public function __construct($data=[])
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('dashboard.emails.resetpassword')
            ->subject('Reset Admin Password')
            ->with('data', $this->data);
    }
}
