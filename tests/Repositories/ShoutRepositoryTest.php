<?php
namespace App\Tests\Repositories;

use App\Repositories\ShoutRepository;
use PHPUnit\Framework\TestCase;

class ShoutRepositoryTest extends TestCase
{
    private $shout_repository;

    function setUp()
    {
        $this->shout_repository = new ShoutRepository();
    }

    public function testGetShoutsReturnsArray()
    {
        $name = 'Steve Jobs';
        $limit = 5;
        $expected_result = 
        [
            "Your time is limited, so don’t waste it living someone else’s life!",
            "The only way to do great work is to love what you do."
        ];
        
        $result = $this->shout_repository->getShouts($name, $limit);
        
        $this->assertEquals($expected_result, $result);
    }

    public function testGetShoutsReturnsEmpty()
    {
        $name = 'Steve Wrong Name';
        $limit = 5;
        $expected_result = [];
        
        $result = $this->shout_repository->getShouts($name, $limit);
        
        $this->assertEquals($expected_result, $result);
    }
}