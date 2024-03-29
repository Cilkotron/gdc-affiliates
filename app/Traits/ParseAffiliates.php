<?php

namespace App\Traits;
use Illuminate\Support\Facades\Config;

trait ParseAffiliates
{
    public static function parseAffiliates(string $file) :array 
    {
        $documentLines = explode("\n", $file);
        $matchedAffiliates = [];
        // Iterate through each line od document
        foreach ($documentLines as $line) {
            $affiliate = json_decode($line, true);
            if ($affiliate !== null) {
                $distance = self::greatCircleDistance($affiliate['latitude'], $affiliate['longitude'],  Config::get('affiliates.dublin_latitude'),  Config::get('affiliates.dublin_longitude'));
                if ($distance <=  Config::get('affiliates.radius')) {
                    $affiliate['distance'] = round($distance, 1) ?? '';
                    array_push($matchedAffiliates, $affiliate);
                }
            }
        }
        return $matchedAffiliates;
    }
}
