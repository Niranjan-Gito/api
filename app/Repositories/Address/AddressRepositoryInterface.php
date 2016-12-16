<?php
namespace GitoAPI\Repositories\Address;


interface AddressRepositoryInterface
{
    public  function get();

    public function findOrfail(int $id);

    public function create(array $data);
}