<?php
namespace App;

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;

class CacheKernel extends HttpCache
{
    const TIMEOUT = 20;

    protected function getOptions(): array
    {
        return [
            'default_ttl' => self::TIMEOUT,
        ];
    }

}