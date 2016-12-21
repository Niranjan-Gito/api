<?php
namespace GitoAPI\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as BaseBuilder;
use Illuminate\Database\Eloquent\Scope;

class TenantScope extends AbstractCommon  implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $column = $model->getQualifiedSiteIdColumn();
        $builder->where($column, '=', siteId());
    }

    /**
     * Remove scope from the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function remove(Builder $builder, Model $model)
    {
        $query = $builder->getQuery();

        $column = $model->getQualifiedSiteIdColumn();

        $bindingKey = 0;

        foreach ((array) $query->wheres as $key => $where)
        {
            if ($this->isSiteIdConstraint($where, $column))
            {
                $this->removeWhere($query, $key);

                // Here SoftDeletingScope simply removes the where
                // but since we use Basic where (not Null type)
                // we need to get rid of the binding as well
                $this->removeBinding($query, $bindingKey);
            }

            // Check if where is either NULL or NOT NULL type,
            // if that's the case, don't increment the key
            // since there is no binding for these types
            if ( ! in_array($where['type'], ['Null', 'NotNull'])) $bindingKey++;
        }
    }

    /**
     * Check if given where is the scope constraint.
     *
     * @param  array   $where
     * @param  string  $column
     * @return boolean
     */
    protected function isSiteIdConstraint(array $where, $column)
    {
        return ($where['type'] == 'Basic' && $where['column'] == $column && $where['value'] == 1);
    }
}