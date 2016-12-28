<?php namespace GitoAPI\Repositories\Domains;

use GitoAPI\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{

    use TenantTrait;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'domains';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function site()
//    {
//        return $this->belongsTo(Site::class);
//    }

}
