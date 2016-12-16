<?php
namespace GitoAPI\Repositories;
class BaseRepository
{
    protected $modelName;
    protected $tenantKey = 'site_id';
    protected $tenantId;

    public function find($id, $relations = [])
    {
        $instance = $this->getNewInstance();
        return $instance->with($relations)->find($id);
    }

    protected function getNewInstance()
    {
        $model = $this->modelName;
        return $model::where($this->tenantKey, $this->tenantId);
    }
}