<?php
namespace GitoAPI\Repositories\Passport;

interface ClintInterface
{
    public function create($userId, $name, $redirect, $personalAccess, $password);
}