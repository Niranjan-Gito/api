<?php
namespace GitoAPI\Traits;


trait Common
{
    /**
     * The published column name from table
     * @var string
     */
    private $active = 'status';

    /**
     * Scope a query to only include active records.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->active, 1);
    }
}