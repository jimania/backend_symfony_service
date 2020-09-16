<?php

namespace App\Helpers;

use App\Interfaces\Helpers\ShoutHelperInterface;

class ShoutHelper implements ShoutHelperInterface
{
    public function transformQuoteToShout(array $quote_array): array
    {
        $shouts = [];
        foreach($quote_array as $quote)
        {
            $shouts[] = strtoupper($quote).'!';
        }
        return $shouts;
    }
}