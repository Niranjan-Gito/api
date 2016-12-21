<?php
namespace GitoAPI\Traits;

use Illuminate\Database\Query\Builder as BaseBuilder;

abstract class AbstractCommon
{
    /**
     * Remove scope constraint from the query.
     *
     * @param  \Illuminate\Database\Query\Builder   $query
     * @param  int  $key
     * @return void
     */
    protected function removeWhere(BaseBuilder $query, $key)
    {
        unset($query->wheres[$key]);

        $query->wheres = array_values($query->wheres);
    }

    /**
     * Remove scope constraint from the query.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  int  $key
     * @return void
     */
    protected function removeBinding(BaseBuilder $query, $key)
    {
        $bindings = $query->getRawBindings()['where'];

        unset($bindings[$key]);

        $query->setBindings($bindings);
    }
}