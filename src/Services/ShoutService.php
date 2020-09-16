<?php
namespace App\Services;

use App\Interfaces\Services\ShoutServiceInterface;
use App\Interfaces\Helpers\ShoutHelperInterface;
use App\Interfaces\Repositories\ShoutRepositoryInterface;

class ShoutService implements ShoutServiceInterface
{
    private $shout_helper;
    private $shout_repository;

    
    public function __construct(ShoutHelperInterface $shout_helper, ShoutRepositoryInterface $shout_repository)
    {
        $this->shout_helper = $shout_helper;
        $this->shout_repository = $shout_repository;
    }

    public function getShouts(string $name, int $limit): array
    {

        $quotes_array = $this->shout_repository->getShouts($name, $limit);

        $shouts =  $this->shout_helper->transformQuoteToShout(
            $quotes_array 
        );

        return $shouts; //leaving the text encoded because we want to return JSON on the API
    }
}