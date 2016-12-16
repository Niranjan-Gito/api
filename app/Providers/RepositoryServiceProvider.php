<?php

namespace GitoAPI\Providers;

use GitoAPI\Repositories\Address\AddressRepository;
use GitoAPI\Repositories\Address\AddressRepositoryInterface;
use GitoAPI\Repositories\Users\UserRepository;
use GitoAPI\Repositories\Users\UserRepositoryInterface;
use GitoAPI\Repositories\Vendors\VendorRepository;
use GitoAPI\Repositories\Vendors\VendorRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $repositories = [
        AddressRepositoryInterface::class   => AddressRepository::class,
        VendorRepositoryInterface::class    => VendorRepository::class,
        UserRepositoryInterface::class      => UserRepository::class,
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $contract => $repository) {
            $this->app->bind($contract, $repository);
        }
    }
}
