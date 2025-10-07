<?php

namespace App\Http\Controllers\Api;

use App\Services\PacienteService;
use App\Http\Requests\PacienteRequest;
use LaravelAux\BaseController;

class PacienteController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param PacienteService $service
     * @param PacienteRequest $request
     */
    public function __construct(PacienteService $service)
    {
        parent::__construct($service, new PacienteRequest);
    }
}