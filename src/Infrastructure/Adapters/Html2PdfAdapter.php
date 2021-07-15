<?php

namespace App\Infrastructure\Adapters;

use App\Application\Contracts\ExportRegistrationPdfExporterInterface;
use App\Domain\Entities\Registration;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

/**
 * Class Html2PdfAdapter
 * @package App\Infrastructure\Adapters
 */
class Html2PdfAdapter implements ExportRegistrationPdfExporterInterface
{
    /**
     * @param Registration $registration
     * @return string
     */
    public function generate(Registration $registration): string
    {
        $html2pdf = new Html2Pdf('P', 'A4');

        try {
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML("<h1>{$registration->getName()}</h1><p>E-mail: {$registration->getEmail()}</p>");

            return $html2pdf->output('', 'S');
        } catch (Html2PdfException $exception) {
            $html2pdf->clean();

            $formatter = new ExceptionFormatter($exception);
            echo $formatter->getHtmlMessage();
        }
    }
}