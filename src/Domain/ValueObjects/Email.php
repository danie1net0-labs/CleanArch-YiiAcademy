<?php

namespace App\Domain\ValueObjects;

use DomainException;

/**
 * Class Email
 * @package App\Domain\ValueObjects
 */
final class Email
{
    /**
     * @var string
     */
    private string $email;

    /**
     * Email constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('Invalid e-mail');
        }

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }
}