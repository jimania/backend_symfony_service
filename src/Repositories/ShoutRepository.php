<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ShoutRepositoryInterface;

class ShoutRepository implements ShoutRepositoryInterface
{

    public function getShouts(string $name, int $limit): array
    {
        $quotes_json = file_get_contents(__DIR__.'/../../resources/quotes.json'); 
        
        $quotes_array = json_decode($quotes_json, true);
        
        $filtered_array = [];
        foreach($quotes_array['quotes'] as $quote)
        {
            if($quote['author'] === $name)
                $filtered_array[] = $quote['quote'];
            if(count($filtered_array) === $limit)
                break;
        }

        return  $filtered_array;
    }
}