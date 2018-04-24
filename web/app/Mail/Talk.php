<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Talk as TalkModel;

class Talk extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data instance.
     *
     * @var Data
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->data = TalkModel::find($id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@onerdm.com')
            ->subject("RDM Talk [{$this->data->email}]")
            ->view('mail.talk');
    }
}
