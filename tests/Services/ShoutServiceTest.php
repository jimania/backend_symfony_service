<?php
namespace App\Tests\Services;

use App\Interfaces\Helpers\ShoutHelperInterface;
use App\Interfaces\Repositories\ShoutRepositoryInterface;
use App\Services\ShoutService;
use PHPUnit\Framework\TestCase;

class ShoutServiceTest extends TestCase
{
    private $mocked_shout_helper;
    private $mocked_shout_repository;
    private $shout_service;

    function setUp()
    {
        $this->mocked_shout_helper = $this->createMock(ShoutHelperInterface::class);
        $this->mocked_shout_repository = $this->createMock(ShoutRepositoryInterface::class);
        $this->shout_service = new ShoutService(
            $this->mocked_shout_helper,
            $this->mocked_shout_repository
        );
    }

    public function testGetShoutsReturnsArray()
    {
        $name = 'Steven Jobs';
        $limit = 5;

        $quotes_array = 
        [
            'quotes_array'
        ];

        $shouts =
        [
            "shouts"
        ];

        $this->mocked_shout_repository
            ->method('getShouts')
            ->with($name, $limit)
            ->willReturn($quotes_array);

        $this->mocked_shout_helper
            ->method('transformQuoteToShout')
            ->with($quotes_array)
            ->willReturn($shouts);

        $result = $this->shout_service->getShouts($name, $limit);
        
        $this->assertEquals($shouts, $result);
    }
}