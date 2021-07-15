<?php

namespace App\Infrastructure\Adapters;

use App\Application\Contracts\StorageInterface;

/**
 * Class LocalStorageAdapter
 * @package App\Infrastructure\Adapters
 */
class LocalStorageAdapter implements StorageInterface
{
    /**
     * @param string $fileName
     * @param string $path
     * @param string $content
     */
    public function store(string $fileName, string $path, string $content): void
    {
        file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, $content);
    }
}