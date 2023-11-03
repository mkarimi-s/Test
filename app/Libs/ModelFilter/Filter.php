<?php

namespace App\Libs\ModelFilter;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    protected array $criteria;
    protected Builder $builder;

    public function __construct(Builder $builder, array $criteria)
    {
        $this->criteria = $criteria;
        $this->builder = $builder;
    }

    protected function isValidCriteria(string $key): bool
    {
        return isset($this->criteria[$key]) && $this->criteria[$key] !== null
            && (!is_array($this->criteria[$key]) || !empty(array_filter($this->criteria[$key])));
    }

    protected function getCriteria(string $key)
    {
        return $this->criteria[$key] ?? null;
    }
    abstract function filter();
}
