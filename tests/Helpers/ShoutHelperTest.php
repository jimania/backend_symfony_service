<?php
namespace App\Tests\Repositories;

use App\Helpers\ShoutHelper;
use PHPUnit\Framework\TestCase;

class ShoutHelperTest extends TestCase
{
    private $shout_helper;

    function setUp()
    {
        $this->shout_helper = new ShoutHelper();
    }

    public function testTransformQuoteToShout()
    {
        $quote_array = 
        [
            "Your time is limited, so don’t waste it living someone else’s life!",
            "The only way to do great work is to love what you do."
        ];
        
        $expected_result = 
        [
            "YOUR TIME IS LIMITED, SO DON’T WASTE IT LIVING SOMEONE ELSE’S LIFE!!",
            "THE ONLY WAY TO DO GREAT WORK IS TO LOVE WHAT YOU DO.!"
        ];

        $result = $this->shout_helper->transformQuoteToShout($quote_array);
        
        $this->assertEquals($expected_result, $result);
    }

}