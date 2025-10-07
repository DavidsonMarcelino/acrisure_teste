<?php

namespace App\Services;

use App\Repositories\PacienteRepository;
use LaravelAux\BaseService;

class PacienteService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param PacienteRepository $repository
     */
    public function __construct(PacienteRepository $repository)
    {
        parent::__construct($repository);
    }
}