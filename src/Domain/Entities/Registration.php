<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\{Cpf, Email};
use DateTimeInterface;

/**
 * Class Registration
 * @package App\Domain\Entities
 */
class Registration
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var Email
     */
    private Email $email;

    /**
     * @var Cpf
     */
    private Cpf $registrationNumber;

    /**
     * @var DateTimeInterface
     */
    private DateTimeInterface $birthDate;

    /**
     * @var DateTimeInterface
     */
    private DateTimeInterface $registeredAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Registration
     */
    public function setName(string $name): Registration
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     * @return Registration
     */
    public function setEmail(Email $email): Registration
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Cpf
     */
    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    /**
     * @param Cpf $registrationNumber
     * @return Registration
     */
    public function setRegistrationNumber(Cpf $registrationNumber): Registration
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeInterface $birthDate
     * @return Registration
     */
    public function setBirthDate(DateTimeInterface $birthDate): Registration
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getRegisteredAt(): DateTimeInterface
    {
        return $this->registeredAt;
    }

    /**
     * @param DateTimeInterface $registeredAt
     * @return Registration
     */
    public function setRegisteredAt(DateTimeInterface $registeredAt): Registration
    {
        $this->registeredAt = $registeredAt;
        return $this;
    }
}