<?php namespace GitoAPI\Transformer\Address;

use GitoAPI\Repositories\Address\Address;
use GitoAPI\Transformer\TransformerAbstract;

class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform an Address model
     *
     * @param Address $address
     * @return array
     */
    public function transform(Address $address)
    {
        return [
            'id'            => $address->id,
            'first_name'    => $address->first_name,
            'last_name'     => $address->last_name,
            'nicename'      => $address->nicename,
            'email'         => $address->email,
            'phone'         => $address->phone,
            'alpha_street'  => $address->alpha_street,
            'beta_street'   => $address->beta_street,
            'city'          => $address->city,
            'state'         => $address->state,
            'zipcode'       => $address->zipcode,
            'created'       => datetime($address->created_at),
            'updated'       => datetime($address->created_at),
        ];
    }
}
