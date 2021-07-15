<?php

namespace App\Application\UseCases\ExportRegistration;

/**
 * Class InputBoundary
 * @package App\Application\UseCases\ExportRegistration
 */
final class InputBoundary
{
    /**
     * @var string
     */
    private string $registrationNumber, $pdfFileName, $pdfPath;

    /**
     * InputBoundary constructor.
     *
     * @param string $registrationNumber
     * @param string $pdfFileName
     * @param string $pdfPath
     */
    public function __construct(string $registrationNumber, string $pdfFileName, string $pdfPath)
    {
        $this->registrationNumber = $registrationNumber;
        $this->pdfFileName = $pdfFileName;
        $this->pdfPath = $pdfPath;
    }

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @return string
     */
    public function getPdfFileName(): string
    {
        return $this->pdfFileName;
    }

    /**
     * @return string
     */
    public function getPdfPath(): string
    {
        return $this->pdfPath;
    }
}