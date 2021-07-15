<?php

namespace App\Infrastructure\Repositories\PostgreSQL;

use App\Domain\Entities\Registration;
use App\Domain\Exceptions\RegistrationNotFoundException;
use App\Domain\Repositories\LoadRegistrationRepositoryInterface;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use DateTimeImmutable;
use Exception;
use PDO;

/**
 * Class LoadRegistrationRepositoryPDO
 * @package App\Infrastructure\Repositories\PostgreSQL
 */
class LoadRegistrationRepositoryPDO implements LoadRegistrationRepositoryInterface
{
    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * LoadRegistrationRepositoryPDO constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param Cpf $cpf
     * @return Registration
     * @throws Exception
     */
    public function loadByRegistrationNumber(Cpf $cpf): Registration
    {
        $statement = $this->pdo->prepare("SELECT * FROM registrations WHERE registration_number = :cpf");
        $statement->execute(['cpf' => $cpf]);
        $record = $statement->fetch();

        if (!$record) {
            throw new RegistrationNotFoundException($cpf);
        }

        return (new Registration())->setName($record['name'])
            ->setBirthDate(new DateTimeImmutable($record['birth_date']))
            ->setRegisteredAt(new DateTimeImmutable($record['registered_at']))
            ->setEmail(new Email($record['email']))
            ->setRegistrationNumber(new Cpf($record['registration_number']));
    }
}