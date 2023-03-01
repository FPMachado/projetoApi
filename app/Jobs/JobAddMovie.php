<?php

namespace App\Jobs;

use App\Mail\MailInformativeMovieUpdated;
use App\Models\PersonalList;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobAddMovie implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tries = 3;
    protected $user;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $data_user, PersonalList $data_personal_list)
    {
        dd($data_personal_list);
        $this->user = $data_user;
        $this->data = $data_personal_list;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new MailInformativeMovieUpdated($this->user, $this->data));
    }
}
