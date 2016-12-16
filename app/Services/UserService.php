<?php

namespace GitoAPI\Services;


use GitoAPI\Exceptions\UserNotFoundException;
use GitoAPI\Repositories\Users\UserRepositoryInterface;

class UserService
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function getById($userId)
    {
        return $this->getRequestedUser($userId);
    }

    private function getRequestedUser($userId)
    {
        $user = $this->user->getById($userId);
        if (is_null($user)) {
            throw new UserNotFoundException();
        }
        return $user;
    }

    public function getUser($request)
    {
        return $this->user->getUser($request);
    }

    public function update($user,$request)
    {
        return $this->user->update($user,$request);
    }
}