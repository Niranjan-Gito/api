<?php
namespace GitoAPI\Repositories\Options;

use GitoAPI\Traits\Common;
use GitoAPI\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use TenantTrait,Common;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function optionHash()
    {
        return $this->hasMany(OptionHash::class);
    }
}