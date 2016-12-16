<?php
namespace GitoAPI\Http\Controllers\V1\Auth;


use GitoAPI\Http\Requests\registerUser;
use GitoAPI\Repositories\Users\UserRepositoryInterface;

class AuthController
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user;

    /**
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param registerUser $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function register(registerUser $request)
    {
        if (! $address = $this->user->create($request->all()) ) {
            return json()->internalError('Failed to create !');
        }
        // respond created item with 201 status code
        return json()
            ->setStatusCode(StatusCode::CREATED)
            ->withItem(
                $address,
                new AddressTransformer()
            );
    }
}