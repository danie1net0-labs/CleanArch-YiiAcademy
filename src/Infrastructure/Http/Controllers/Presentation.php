<?php

namespace App\Infrastructure\Http\Controllers;

/**
 * Interface Presentation
 * @package App\Infrastructure\Http\Controllers
 */
interface Presentation
{
    /**
     * @param array $data
     * @return string
     */
    public function output(array $data): string;
}