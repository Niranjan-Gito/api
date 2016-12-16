<?php
namespace GitoAPI\Transformer\Vendors;


use GitoAPI\Repositories\Vendors\Vendor;
use GitoAPI\Transformer\Address\AddressTransformer;
use GitoAPI\Transformer\TransformerAbstract;
use League\Fractal\ParamBag;

class VendorTransformer extends TransformerAbstract
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
     * @param Vendor $vendor
     * @return array
     */
    public function transform(Vendor $vendor)
    {
        return [
            'name'          => $vendor->vendor_name,
            'slug'          => $vendor->vendor_slug,
            'description'   => $vendor->description,
            'address'       => $vendor->address,
            'email'         => $vendor->email,
            'phone'         => $vendor->phone,
            'fax'           => $vendor->fax,
            'rating'        => $vendor->rating,
            'votes'         => $vendor->votes,
            'created'       => datetime($vendor->created_at),
            'updated'       => datetime($vendor->created_at),
        ];
    }


    /**
     * Include Address.
     * This method is used, when an API client request /v1/user??include=address
     *
     * @param  Vendor $vendor
     * @param  \League\Fractal\ParamBag|null $params
     * @return  \League\Fractal\Resource\Collection
     */
    public function includeAddress(Vendor $vendor, ParamBag $params=null)
    {
        $transformer    = new AddressTransformer($params);
        $parsed         = $transformer->getParsedParams();
        $address        = $vendor->address()->limit($parsed['limit'])->offset($parsed['offset'])->orderBy($parsed['sort'], $parsed['order'])->get();

        return $this->collection($address, new AddressTransformer);
    }
}