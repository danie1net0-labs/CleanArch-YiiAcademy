<?php

namespace App\Application\Contracts;

use App\Domain\Entities\Registration;

/**
 * Interface PdfExporterInterface
 * @package App\Application\Contracts
 */
interface ExportRegistrationPdfExporterInterface
{
    /**
     * @param Registration $registration
     * @return string
     */
    public function generate(Registration $registration): string;
}