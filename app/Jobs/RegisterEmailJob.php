<?php

namespace App\Jobs;

use App\Mail\RegistrationMailController;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class RegisterEmailJob
{
    use Dispatchable;
    protected $object;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($object = [])
    {
        $this->object = $object;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->object->email)->send(new RegistrationMailController($this->object->id));
    }
}
