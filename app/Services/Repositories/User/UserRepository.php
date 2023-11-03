<?php

namespace App\Services\Repositories\User;

use App\Libs\ModelFilter\User\UserFilter;
use App\Models\User;
use App\Services\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getAllUsers(array $criteria): LengthAwarePaginator
    {
        return (new UserFilter($this->model->query(), $criteria))
            ->filter()
            ->orderBy('id', 'DESC')
            ->paginate();
    }
}
