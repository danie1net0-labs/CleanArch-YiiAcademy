<?php

ini_set('display_errors', true);

use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Infrastructure\Adapters\Html2PdfAdapter;
use App\Infrastructure\Adapters\LocalStorageAdapter;
use App\Infrastructure\Http\Controllers\ExportRegistrationController;
use App\Infrastructure\Presentation\ExportRegistrationPresenter;
use App\Infrastructure\Repositories\PostgreSQL\LoadRegistrationRepositoryPDO;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$appConfig = require dirname(__DIR__) . '/config/app.php';

$dsn = sprintf(
    "pgsql:dbname=%s;host=%s;user=%s;password=%s",
    $appConfig['db']['dbname'],
    $appConfig['db']['host'],
    $appConfig['db']['username'],
    $appConfig['db']['password']
);

$pdo = new PDO($dsn, $appConfig['db']['username'], $appConfig['db']['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_PERSISTENT => true
]);

$loadRegistrationRepository = new LoadRegistrationRepositoryPDO($pdo);
$pdfExporter = new Html2PdfAdapter();
$storage = new LocalStorageAdapter();

try {
    $exportRegistrationUseCase = new ExportRegistration($loadRegistrationRepository, $pdfExporter, $storage);
    $request = new Request('GET', 'http://localhost:8080');
    $response = new Response();

    header("Content-Type: application/json; charset=utf-8");

    $exportRegistrationController = new ExportRegistrationController($request, $response, $exportRegistrationUseCase);
    $exportRegistrationPresenter = new ExportRegistrationPresenter();
    echo $exportRegistrationController->handle($exportRegistrationPresenter)->getBody();
} catch (Exception $e) {
    echo $e->getMessage();
}