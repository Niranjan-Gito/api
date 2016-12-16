<?php
namespace GitoAPI\Repositories\Address;


class AddressRepository implements AddressRepositoryInterface
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function get()
    {
        return $this->address->get();
    }

    public function findOrfail(int $id)
    {
        return $this->address->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->address->create($data);
    }
}