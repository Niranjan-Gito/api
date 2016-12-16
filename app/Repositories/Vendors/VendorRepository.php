<?php
namespace GitoAPI\Repositories\Vendors;


class VendorRepository implements VendorRepositoryInterface
{
    protected  $vendor;

    function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function first()
    {
        return $this->vendor->first();
    }

    public function get()
    {
        return $this->vendor->active()->get();
    }

    public function firstOrFail($slug)
    {
        return $this->vendor->active()->where('vendor_slug',$slug)->firstOrFail();
    }
}