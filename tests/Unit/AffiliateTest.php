<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Config;
use App\Traits\FileRead; 
use App\Traits\Distance; 
use App\Traits\ParseAffiliates;

class AffiliateTest extends TestCase
{
    use FileRead, Distance, ParseAffiliates;
    public function testGetAffiliates()
    {
        // Call the method
        $affiliates = Affiliate::getAffiliates();


        // Assert the returned value
        $this->assertIsArray($affiliates);
        $this->assertCount(16, $affiliates);
    

        // Assert the structure of each affiliate
        $this->assertArrayHasKey('affiliate_id', $affiliates[0]);
        $this->assertArrayHasKey('name', $affiliates[0]);
        $this->assertArrayHasKey('latitude', $affiliates[0]);
        $this->assertArrayHasKey('longitude', $affiliates[0]);
        $this->assertArrayHasKey('distance', $affiliates[0]); 

        // Clean up the test file
        unlink('test_affiliates.txt');
    }
}
