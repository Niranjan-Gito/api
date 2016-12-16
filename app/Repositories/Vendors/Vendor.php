<?php namespace GitoAPI\Repositories\Vendors;

use GitoAPI\Traits\Common;
use GitoAPI\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use TenantTrait,Common;
}