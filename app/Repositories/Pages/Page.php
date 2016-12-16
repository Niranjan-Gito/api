<?php
namespace GitoAPI\Repositories\Pages;

use GitoAPI\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use TenantTrait;

}