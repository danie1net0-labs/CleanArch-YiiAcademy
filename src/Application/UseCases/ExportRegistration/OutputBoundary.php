<?php


namespace App\Application\UseCases\ExportRegistration;

/**
 * Class OutputBoundary
 * @package App\Application\UseCases\ExportRegistration
 */
final class OutputBoundary
{
    /**
     * @var string
     */
    private string $fullFileName;

    /**
     * OutputBoundary constructor.
     * @param string $fullFileName
     */
    public function __construct(string $fullFileName)
    {
        $this->fullFileName = $fullFileName;
    }

    /**
     * @return string
     */
    public function getFullFileName(): string
    {
        return $this->fullFileName;
    }
}