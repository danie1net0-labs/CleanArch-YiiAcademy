<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Application\UseCases\ExportRegistration\InputBoundary;
use App\Application\UseCases\ExportRegistration\OutputBoundary;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class ExportRegistrationController
 * @package App\Infrastructure\Http\Controllers
 */
final class ExportRegistrationController
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Response
     */
    private Response $response;

    /**
     * @var ExportRegistration
     */
    private ExportRegistration $useCase;

    /**
     * @param Request $request
     * @param Response $response
     * @param ExportRegistration $useCase
     */
    public function __construct(Request $request, Response $response, ExportRegistration $useCase)
    {
        $this->request = $request;
        $this->response = $response;
        $this->useCase = $useCase;
    }

    /**
     * @param Presentation $presentation
     * @return Response
     */
    public function handle(Presentation $presentation): Response
    {
        $inputBoundary = new InputBoundary('74424886093', 'registration.pdf', __DIR__ . '/../../../../storage/registrations');
        $outputBoundary = $this->useCase->handle($inputBoundary);

        $this->response
            ->getBody()
            ->write($presentation->output([
                'fullFileName' => $outputBoundary->getFullFileName()
            ]));

        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}