<?php
namespace GitoAPI\Jobs\User;

use GitoAPI\Repositories\Newsletter\NewsletterRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use League\Flysystem\Exception;

class createUserSubscriptionJob implements ShouldQueue
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
     * @param NewsletterRepositoryInterface $newsletter
     * @return Mixed
     */
    public function handle(NewsletterRepositoryInterface $newsletter)
    {
        $newsletter->create($this->request);
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