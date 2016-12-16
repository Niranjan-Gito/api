<?php
namespace GitoAPI\Http\Controllers\V1\Address;

use GitoAPI\Http\Requests\storeAddress;
use GitoAPI\Services\AddressService;
use GitoAPI\Transformer\Address\AddressTransformer;
use Illuminate\Http\Request;
/**
 * @resource Address
 *
 * Get the Address details
 */
class AddressController
{
    /**
     * @var AddressService
     */
    protected $address;

    /**
     * @param AddressService $address
     */
    public function __construct(AddressService $address)
    {
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function index(Request $request)
    {
        return json()->withCollection($this->address->get(),new AddressTransformer());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storeAddress $request
     * @return Mixed
     */
    public function store(storeAddress $request)
    {
        $this->address->create($request);
        return json()->created('Successfully created address.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Http\Response
     */
    public function show(Request $request,$id)
    {
        return json()->withItem($this->address->findOrFail($id),new AddressTransformer());
    }

}