<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Affiliate;

class AffiliateTest extends TestCase
{
    public function testGetAffiliates()
    {
      
        $affiliates = Affiliate::getAffiliates();

        $this->assertIsArray($affiliates);
        $this->assertCount(2, $affiliates);

        $this->assertArrayHasKey('affiliate_id', $affiliates[0]);
        $this->assertArrayHasKey('name', $affiliates[0]);
        $this->assertArrayHasKey('latitude', $affiliates[0]);
        $this->assertArrayHasKey('longitude', $affiliates[0]);

    }
}
