<?php

namespace App\Libs\ModelFilter\User;

use App\Libs\ModelFilter\Filter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends Filter
{
    public function __construct(Builder $builder, array $criteria)
    {
        parent::__construct($builder, $criteria);
    }

    function filter(): Builder
    {
        $this->nameFilter();
        $this->familyFilter();

        return $this->builder;
    }

    public function nameFilter()
    {
        if(!$this->isValidCriteria('name')) {
            return $this->builder;
        }

        $name = $this->getCriteria('name');
        return $this->builder->where('name', 'like', "%$name%");
    }

    public function familyFilter()
    {
        if(!$this->isValidCriteria('family')) {
            return $this->builder;
        }

        $family = $this->getCriteria('family');
        return $this->builder->where('family', 'like', "%$family%");
    }
}
