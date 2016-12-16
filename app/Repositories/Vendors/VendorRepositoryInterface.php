<?php
namespace GitoAPI\Repositories\Vendors;

interface VendorRepositoryInterface
{
    public function first();
    public function get();
    public function firstOrFail($slug);
}