<?php

namespace App\Domain\ValueObjects;

use DomainException;

/**
 * Class Cpf
 * @package App\Domain\ValueObjects
 */
final class Cpf
{
    /**
     * @var string
     */
    private string $cpf;

    /**
     * Cpf constructor.
     * @param string $cpf
     */
    public function __construct(string $cpf)
    {
        if (!$this->validate($cpf)) {
            throw new DomainException('Invalid CPF');
        }

        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return bool
     */
    public function validate(string $cpf): bool
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf);

        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] !==  (string) $d) {
                return false;
            }
        }

        return true;
    }
}