<?php
namespace GitoAPI\Repositories\Users;


interface UserRepositoryInterface
{
    public function getById($userId);

    public function create(array $data);

    public function update($user,array $data);

    public function getUser($request);
}