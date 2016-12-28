<?php
namespace GitoAPI\Repositories\Options;

use GitoAPI\Traits\Common;
use GitoAPI\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class OptionHash extends Model
{
    use TenantTrait,Common;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options_hash';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function optionHash()
    {
        return $this->belongsTo(Option::class);
    }
}