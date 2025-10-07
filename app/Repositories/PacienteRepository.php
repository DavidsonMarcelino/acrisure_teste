<?php

namespace App\Repositories;

use App\Models\Paciente;
use LaravelAux\BaseRepository;

class PacienteRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Paciente $model
     */
    public function __construct(Paciente $model)
    {
        parent::__construct($model);
    }
}