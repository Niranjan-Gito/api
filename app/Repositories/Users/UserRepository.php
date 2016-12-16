<?php
/**
 * Created by PhpStorm.
 * User: niranjan
 * Date: 8/12/16
 * Time: 11:06 AM
 */

namespace GitoAPI\Repositories\Users;

use GitoAPI\User;

class UserRepository implements UserRepositoryInterface
{
    protected  $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getById($userId)
    {
        return $this->user->find($userId);
    }

    public function create(array $data)
    {
        $this->user->fill($data);
        return $this->user->save();
    }

    public function update($user,array $data)
    {
        $this->user = $user;
        $this->user->fill($data);
        return $this->user->save();
    }

    public function getUser($request)
    {
        return $request->user();
    }
}