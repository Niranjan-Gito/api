<?php

namespace GitoAPI\Jobs\Auth;

use GitoAPI\Repositories\Users\UserRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use League\Flysystem\Exception;

class createUserRegistrationJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    public $request;

    /**
     * Create a new job instance.
     * @param $request array
     * @return Mixed
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return Mixed
     */
    public function handle(UserRepositoryInterface $user)
    {
        $user->create($this->request);
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return Mixed
     */
    public function failed(Exception $exception)
    {
        return json()->internalError('Failed to create !');
    }
}
