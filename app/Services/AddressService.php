<?php

namespace GitoAPI\Services;

use GitoAPI\Jobs\Address\createUserAddressJob;
use GitoAPI\Repositories\Address\AddressRepositoryInterface;
use Illuminate\Http\Request;

class AddressService
{
    /**
     * @var AddressRepositoryInterface
     */
    protected $address;

    /**
     * @param AddressRepositoryInterface $address
     */
    public function __construct(AddressRepositoryInterface $address)
    {
        $this->address = $address;
    }

    public function get()
    {
        return $this->address->get();
    }

    public function create(Request $request)
    {
        $request->merge($this->formatAddress($request));
        $data = dispatch(new createUserAddressJob($request->all()));
        dd($data);
    }

    public function findOrFail($id)
    {
        return $this->address->findOrFail($id);
    }

    private function formatAddress($request)
    {
        $user = $request->user();
        return [
            'site_id'       => siteId(),
            'first_name'    => $request->get('first_name')??$user->nicename,
            'last_name'     => $request->get('last_name')??$user->nicename,
            'nicename'      => $request->get('nicename')??$user->nicename,
            'email'         => $request->get('email')??$user->email,
        ];
    }
}