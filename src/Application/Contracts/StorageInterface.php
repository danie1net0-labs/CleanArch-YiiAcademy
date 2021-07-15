<?php

namespace App\Application\Contracts;

/**
 * Interface StorageInterface
 * @package App\Application\Contracts
 */
interface StorageInterface
{
    /**
     * @param string $fileName
     * @param string $path
     * @param string $content
     */
    public function store(string $fileName, string $path, string $content): void;
}