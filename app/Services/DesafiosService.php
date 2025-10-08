<?php

namespace App\Services;

use App\Repositories\DesafiosRepository;
use LaravelAux\BaseService;

class DesafiosService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param DesafiosRepository $repository
     */
    public function __construct(DesafiosRepository $repository)
    {
        parent::__construct($repository);
    }
}