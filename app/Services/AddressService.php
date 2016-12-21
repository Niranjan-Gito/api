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
        dispatch(new createUserAddressJob($request->all()));
    }

    public function findOrFail($id)
    {
        if($addres = $this->address->findOrFail($id))
        {
            return $addres;
        }
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