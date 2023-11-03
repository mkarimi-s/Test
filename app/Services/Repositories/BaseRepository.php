<?php

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
