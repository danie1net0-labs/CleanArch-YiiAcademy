<?php

namespace App\Application\UseCases\ExportRegistration;

use App\Application\Contracts\ExportRegistrationPdfExporterInterface;
use App\Application\Contracts\StorageInterface;
use App\Domain\Repositories\LoadRegistrationRepositoryInterface;
use App\Domain\ValueObjects\Cpf;

/**
 * Class ExportRegistration
 * @package App\Application\UseCases\ExportRegistration
 */
final class ExportRegistration
{
    /**
     * @var LoadRegistrationRepositoryInterface
     */
    private LoadRegistrationRepositoryInterface $repository;

    /**
     * @var ExportRegistrationPdfExporterInterface
     */
    private ExportRegistrationPdfExporterInterface $pdfExporter;

    /**
     * @var StorageInterface
     */
    private StorageInterface $storage;

    /**
     * ExportRegistration constructor.
     * @param LoadRegistrationRepositoryInterface $repository
     * @param ExportRegistrationPdfExporterInterface $pdfExporter
     * @param StorageInterface $storage
     */
    public function __construct(
        LoadRegistrationRepositoryInterface $repository,
        ExportRegistrationPdfExporterInterface $pdfExporter,
        StorageInterface $storage
    )
    {
        $this->repository = $repository;
        $this->pdfExporter = $pdfExporter;
        $this->storage = $storage;
    }

    public function handle(InputBoundary $inputBoundary): OutputBoundary
    {
        $registration = $this->repository->loadByRegistrationNumber(new Cpf($inputBoundary->getRegistrationNumber()));
        $fileContent = $this->pdfExporter->generate($registration);
        $this->storage->store($inputBoundary->getPdfFileName(), $inputBoundary->getPdfPath(), $fileContent);

        return new OutputBoundary($inputBoundary->getPdfPath() . DIRECTORY_SEPARATOR . $inputBoundary->getPdfFileName());
    }
}