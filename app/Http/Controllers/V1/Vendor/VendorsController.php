<?php
namespace GitoAPI\Http\Controllers\V1\Vendor;


use GitoAPI\Repositories\Vendors\VendorRepositoryInterface;
use GitoAPI\Transformer\Vendors\VendorTransformer;
use Illuminate\Http\Request;

class VendorsController
{
    /**
     * @var VendorRepositoryInterface
     */
    protected $vendor;

    /**
     * @param VendorRepositoryInterface $vendor
     */
    public function __construct(VendorRepositoryInterface $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function index(Request $request)
    {
        return json()->withCollection($this->vendor->get(),new VendorTransformer());
    }

    /**
     * Display a vendor by slug of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function show(Request $request,$slug)
    {
        return json()->withItem($this->vendor->firstOrFail($slug),new VendorTransformer());
    }
}