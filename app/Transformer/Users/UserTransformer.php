<?php namespace GitoAPI\Transformer\Users;

use GitoAPI\Transformer\TransformerAbstract;
use GitoAPI\User;
use GitoAPI\Transformer\Address\AddressTransformer;
use League\Fractal\ParamBag;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = ['address',];
    /**
     * Transform an user model
     *e.g. collection case -> ?include=address:limit(5|0):order(created_at|desc)
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        $payload = [
            'name'      => $user->nicename,
            'email'     => $user->email,
            'phone'     => $user->phone,
            'gravatar'  => gravatar($user->email),
            'created'   => datetime($user->created_at),
            'updated'   => datetime($user->created_at),
        ];

        if ($fields = $this->getPartialFields()) {
            $payload = array_only($payload, $fields);
        }

        return $payload;
    }

    /**
     * Include Address.
     * This method is used, when an API client request /v1/user??include=address
     *
     * @param  User $user
     * @param  \League\Fractal\ParamBag|null $params
     * @return  \League\Fractal\Resource\Collection
     */
    public function includeAddress(User $user, ParamBag $params=null)
    {
        $transformer    = new AddressTransformer($params);
        $parsed         = $transformer->getParsedParams();
        $address        = $user->address()->limit($parsed['limit'])->offset($parsed['offset'])->orderBy($parsed['sort'], $parsed['order'])->get();

        return $this->collection($address, new AddressTransformer);
    }
}
