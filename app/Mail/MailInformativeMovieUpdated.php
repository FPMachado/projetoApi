<?php

namespace App\Mail;

use App\Models\Movies;
use App\Models\PersonalList;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInformativeMovieUpdated extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $data_movies;
    protected $movie;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, PersonalList $data_personal_list, Movies $movie)
    {
        $this->user = $user;
        $this->data_movies = $data_personal_list;
        $this->movie = $movie;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Nova mudança nos seus Filmes!");
        $this->to($this->user->email);
        return $this->markdown('mail.informativeMovieUpdatedMail', ['user' => $this->user, 'data_movies' => $this->data_movies, 'movie' => $this->movie]);
    }
}
