<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class ProviderEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $provider, $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($provider, $link)
    {
        $this->provider = $provider;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = $this->link;
        
        $url = env('PROVIDER_APP_URL','http://localhost:8080/') . "account/generate/" . Crypt::encryptString($link->id);

        return $this->view('mails.provider.registration',['provider' => $this->provider, 'url' => $url])->subject('INFOTEC');
    }
}
