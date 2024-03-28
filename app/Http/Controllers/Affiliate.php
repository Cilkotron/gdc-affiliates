<?php

namespace App\Http\Controllers;


class Affiliate extends Controller
{
    const DUBLIN_LAT = 53.3340285;
    const DUBLIN_LNG = -6.2535495;

    public static function getAffiliates() :array 
    {
        $fileName = 'affiliates.txt';
        $radius = 100; 

        $file = File::readFromFile($fileName);

        $matchedAffiliates = self::parseAffiliates($file, $radius);

        $sortedObjects = Sort::sortArray($matchedAffiliates, 'affiliate_id', 'asc');

        return $sortedObjects;
    }

    private static function parseAffiliates(string $file, int $radius ) :array 
    {
        $documentLines = explode("\n", $file);
        $matchedAffiliates = [];
        // Iterate through each line od document
        foreach ($documentLines as $line) {
            $jsonData = json_decode($line);
            if ($jsonData !== null) {
                $distance = new Distance();
                $distance = $distance->greatCircleDistance($jsonData->latitude, $jsonData->longitude, self::DUBLIN_LAT, self::DUBLIN_LNG);
                if ($distance <= $radius) {
                    array_push($matchedAffiliates, $jsonData);
                }
            }
        }
        return $matchedAffiliates;
    }
}
