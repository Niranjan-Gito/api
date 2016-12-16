<?php

namespace GitoAPI\Jobs\Address;

use GitoAPI\Repositories\Address\AddressRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use League\Flysystem\Exception;

class createUserAddressJob implements ShouldQueue
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
    public function handle(AddressRepositoryInterface $address)
    {
        $data = $address->create($this->request);
        dd($data->id);
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
