<?php

namespace GitoAPI\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class userRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The user array.
     *
     * @var array User
     */
    protected $user;
    /**
     * Create a new message instance.
     * @param array $user
     *
     * @return Mixed
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->onQueue('default');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.user-register')->withUser($this->user);
    }
}
