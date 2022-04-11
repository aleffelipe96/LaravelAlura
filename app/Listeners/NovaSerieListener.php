<?php

namespace App\Listeners;

use App\User;
use App\Mail\NovaSerieMail;
use App\Events\NovaSerieEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaSerieListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerieEvent  $event
     * @return void
     */
    public function handle(NovaSerieEvent $event)
    {
        $nome = $event->nomeSerie;
        $qtd_temporadas = $event->qtdTemporadas;
        $qtd_episodios = $event->qtdEpisodios;

        $users = User::all();

        foreach ($users as $user) {
            $email = new NovaSerieMail($nome, $qtd_temporadas, $qtd_episodios);

            $email->subject = 'Nova série adicionada';

            $when = now()->addSeconds(5);

            Mail::to($user)->later($when, $email);
        }
    }
}
