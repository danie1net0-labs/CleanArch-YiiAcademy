<?php

namespace App\Infrastructure\Presentation;

use App\Infrastructure\Http\Controllers\Presentation;
use JsonException;

/**
 * Class ExportRegistrationPresenter
 * @package App\Infrastructure\Presentation
 */
final class ExportRegistrationPresenter implements Presentation
{
    /**
     * @param array $data
     * @return string
     * @throws JsonException
     */
    public function output(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}