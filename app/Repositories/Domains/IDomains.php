<?php namespace Admin\Repositories\Domains;

/**
 * Domains repository interface
 *
 * @file IDomains.php
 * @author Rajdeep Tarat <rajdeeptarat@gmail.com>
 */
interface IDomains
{
    /**
     * @return mixed
     * @author Dileep <dileep.dv@costprize.com>
     */
    public function details($base_url);

    /**
     * @param array $params
     * @return mixed
     */
    public function getPaginated(array $params);

    /**
     * @param $domain
     * @return mixed
     */
    public function store($domain);

    /**
     * @param $sites
     * @return mixed
     */
    public function updateStatus($sites);

    /**
     * @param $site
     * @return mixed
     */
    public function update($domain);

    /**
     * @param $site
     * @return mixed
     */
    public function updateStatusBasedOnSiteStatus($site);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $array
     * @return mixed
     */
    public function bulkStore($array);
}