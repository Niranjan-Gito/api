<?php
namespace GitoAPI\Http\Controllers\V1\Auth;


use GitoAPI\Http\Requests\registerUser;
use GitoAPI\Http\Requests\subscribeUser;
use GitoAPI\Services\AuthService;

class AuthController
{
    /**
     * @var AuthService
     */
    protected $auth;

    /**
     * @param AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param registerUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(registerUser $request)
    {
        $this->auth->create($request);

        // respond created item with 201 status code
        return json()->created('User registered');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param subscribeUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(subscribeUser $request)
    {
        $this->auth->subscribe($request->all());

        // respond created item with 201 status code
        return json()->created('Successfully subscribed.');
    }
}