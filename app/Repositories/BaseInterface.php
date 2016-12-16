<?php
namespace GitoAPI\Repositories;
interface BaseInterface
{
    public function find($id, $relations = []);
}