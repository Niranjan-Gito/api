<?php
namespace GitoAPI\Repositories\Passport;

use Laravel\Passport\Client;

class ClientRepository implements ClintInterface
{
    /**
     * The client repository instance.
     *
     * @var ClientRepository
     */
    protected $clients;

    function __construct(Client $client)
    {
        $this->clients = $client;
    }

    /**
     * Store a new client.
     *
     * @param  int  $userId
     * @param  string  $name
     * @param  string  $redirect
     * @param  bool  $personalAccess
     * @param  bool  $password
     * @return Client
     */

    public function create($siteId,$userId, $name, $redirect, $personalAccess = false, $password = false)
    {
        $client = $this->clients->forceFill([
            'site_id' => $siteId,
            'user_id' => $userId,
            'name' => $name,
            'secret' => str_random(40),
            'redirect' => $redirect,
            'personal_access_client' => $personalAccess,
            'password_client' => $password,
            'revoked' => false,
        ]);
        $client->save();
        return $client;
    }
}