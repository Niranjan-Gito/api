<?php
namespace GitoAPI\Transformer;

use GitoAPI\Exceptions\NotFoundException;
use League\Fractal\TransformerAbstract;

class SimpleArrayTransformer extends TransformerAbstract
{
    /**
     * Transform single resource
     *
     * @param $model
     * @return array
     * @throws \Exception
     */
    public function transform($model)
    {
        if (! $model instanceof Collection::class) {
            throw new NotFoundException('Expecting an instance of \Illuminate\Database\Eloquent\Collection, ' . get_class($model) . ' given.');
        }

        return $model->toArray();
    }
}