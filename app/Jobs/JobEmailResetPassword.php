<?php

namespace App\Jobs;

use App\Mail\LinkResetPassword;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class JobEmailResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $tries = 3;
    private $user;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $dataUser)
    {
        $this->user = $dataUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
        return Mail::send(new LinkResetPassword($this->user));
    }
}
