<?php namespace Admin\Repositories\Domains;

/**
 * Domains repository
 *
 * @file Domains.php
 * @author Rajdeep Tarat <rajdeeptarat@gmail.com>
 */
class Domains implements IDomains
{

    /**
     * @var Domain
     */
    private $domain;

    /**
     * @param Domain $domain
     */
    function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }


    /**
     * @param $base_url
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @author Dileep <dileep.dv@costprize.com>
     */
    public function details($base_url)
    {
        $relations = ['site'];

        return $this->domain
            ->join('sites', 'sites.id', '=', 'domains.site_id')
            ->join('tenants', 'tenants.id', '=', 'sites.tenant_id')
            ->with($relations)
            ->where('domains.fqdn', '=', $base_url)
            ->where('tenants.status', '=', 'ACTIVE')
            ->where('sites.status', '=', 'ACTIVE')
            ->where('domains.status', '=', 'ACTIVE')
            ->first(['domains.*']);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function getPaginated(array $params)
    {
        return $this->getFilteredDomains()
            ->orderBy('domains.updated_at', 'desc')
            ->paginate($params['limit'], ['domains.*']);

    }

    private function getFilteredDomains()
    {
        $relations = ['site', 'site.tenant'];

        $tables = ['site', 'tenants'];

        return $this->domain
            // Joins are only to allow sorting/searching on related fields.
            ->join('sites', 'sites.id', '=', 'domains.site_id')
            ->join('tenants', 'tenants.id', '=', 'sites.tenant_id')
            ->with($relations)
            ->filterable($tables)
            ->searchable($tables);
    }


    /**
     * @param $domain
     * @return mixed
     */
    public function store($domain)
    {
        return $this->domain->create([
            'name'        => $domain->domainName,
            'fqdn'        => $domain->fullyQualifiedDomainName,
            'description' => $domain->description,
            'status'      => $domain->status,
            'site_id'     => $domain->siteName
        ]);
    }

    /**
     * Update domain status based on the tenant status
     *
     * @param $sites
     * @return int
     */
    public function updateStatus($sites)
    {
        $noOfDomains = 0;
        foreach ($sites as $site) {
            $domains = $this->updateStatusBasedOnSiteStatus($site);
            $noOfDomains += count($domains);
        }

        return $noOfDomains;
    }

    /**
     * @param $site
     * @return mixed
     */
    public function updateStatusBasedOnSiteStatus($site)
    {
        //Get all the domains based on site id
        $domains = $this->domain->where('site_id', '=', $site->id)->get();

        foreach ($domains as $domain) {
            //Update domain status one by one
            $domain->status = $site->status;
            $domain->save();
        }

        return $domains;
    }

    /**
     * @param $site
     * @return mixed
     */
    public function update($domain)
    {
        $update = $this->domain->find($domain->domainId);
        $update->fqdn = $domain->fullyQualifiedDomainName;
        $update->description = $domain->description;
        $update->status = $domain->status;
        $update->save();

        return $update;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->domain->find($id);
    }

    /**
     * @param $array
     * @return mixed
     */
    public function bulkStore($array)
    {
        //Bulk insert
        $result = $this->domain->insert($array);
        return $result;
    }
}