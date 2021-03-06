<?php

namespace App\Jobs;

use App\Mail\CompanyCreatedWelcome;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CompanyCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->mail = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Mail::to($this->mail)->send(new CompanyCreatedWelcome());
    }
}
