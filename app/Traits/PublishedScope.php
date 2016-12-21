<?php
namespace GitoAPI\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class PublishedScope extends AbstractCommon  implements Scope
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
        $column = $model->getQualifiedPublishedColumn();
        $builder->where($column, '=', 1);
        $this->addWithDrafts($builder);
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

        $column = $model->getQualifiedPublishedColumn();

        $bindingKey = 0;

        foreach ((array) $query->wheres as $key => $where)
        {
            if ($this->isPublishedConstraint($where, $column))
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
    protected function isPublishedConstraint(array $where, $column)
    {
        return ($where['type'] == 'Basic' && $where['column'] == $column && $where['value'] == 1);
    }

    /**
     * Extend Builder with custom method.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     */
    protected function addWithDrafts(Builder $builder)
    {
        $builder->macro('withDrafts', function(Builder $builder)
        {
            $this->remove($builder, $builder->getModel());

            return $builder;
        });
    }
}