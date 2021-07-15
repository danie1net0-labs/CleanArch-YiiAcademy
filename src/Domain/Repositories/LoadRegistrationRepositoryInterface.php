<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;

/**
 * Interface LoadRegistrationRepositoryInterface
 * @package App\Domain\Repositories
 */
interface LoadRegistrationRepositoryInterface
{
    public function loadByRegistrationNumber(Cpf $cpf): Registration;
}