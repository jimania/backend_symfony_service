<?php
namespace App\Interfaces\Helpers;

interface ShoutHelperInterface
{
    public function transformQuoteToShout(array $value): array;
}