<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use App\Traits\FileRead; 
use App\Traits\Distance; 

class Affiliate extends Controller
{

    use FileRead, Distance; 
    const DUBLIN_LAT = 53.3340285;
    const DUBLIN_LNG = -6.2535495;
    const RADIUS = 100; 


    public static function getAffiliates() :array 
    {
        $fileName = 'affiliates.txt';
      
        $file = self::readFromFile($fileName);

        $matchedAffiliates = self::parseAffiliates($file, self::RADIUS);

        $sortedObjects = Arr::sort($matchedAffiliates, 'affiliate_id'); 

        return $sortedObjects;
    }

    private static function parseAffiliates(string $file) :array 
    {
        $documentLines = explode("\n", $file);
        $matchedAffiliates = [];
        // Iterate through each line od document
        foreach ($documentLines as $line) {
            $affiliate = json_decode($line);
            if ($affiliate !== null) {
                $distance = self::greatCircleDistance($affiliate->latitude, $affiliate->longitude, self::DUBLIN_LAT, self::DUBLIN_LNG);
                if ($distance <= self::RADIUS) {
                    $affiliate->distance = round($distance, 1) ?? '';
                    array_push($matchedAffiliates, $affiliate);
                }
            }
        }
        return $matchedAffiliates;
    }
}
