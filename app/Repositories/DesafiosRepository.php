<?php

namespace App\Repositories;

use App\Models\Desafios;
use LaravelAux\BaseRepository;

class DesafiosRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Desafios $model
     */
    public function __construct(Desafios $model)
    {
        parent::__construct($model);
    }
}