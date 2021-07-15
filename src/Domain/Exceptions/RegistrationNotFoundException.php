<?php

namespace App\Domain\Exceptions;

use App\Domain\ValueObjects\Cpf;
use Exception;
use Throwable;

/**
 * Class RegistrationNotFoundException
 * @package App\Domain\Exceptions
 */
class RegistrationNotFoundException extends Exception
{
    /**
     * RegistrationNotFoundException constructor.
     *
     * @param Cpf $cpf
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(Cpf $cpf, $code = 0, Throwable $previous = null)
    {
        $message = "Inscrição de número {$cpf} não encontrada.";
        parent::__construct($message, $code, $previous);
    }
}