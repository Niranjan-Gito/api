<?php
namespace GitoAPI\Traits;

trait TenantTrait
{
    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TenantScope);
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getSiteIdColumn()
    {
        return defined('static::SITEID_COLUMN') ? static::SITEID_COLUMN : 'site_id';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedSiteIdColumn()
    {
        return $this->getTable().'.'.$this->getSiteIdColumn();
    }
}