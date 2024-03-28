<?php

namespace App\Http\Controllers;



class Affiliate extends Controller
{
    public static function getAffiliates()
    {
        $fileName = 'affiliates.txt';

        $file = File::readFromFile($fileName);

        $matchedAffiliates = self::parseAffiliates($file);

        $sortedObjects = Sort::sortArray($matchedAffiliates, 'affiliate_id', 'asc');

        return $sortedObjects;
    }

    private static function parseAffiliates($file) {
        $documentLines = explode("\n", $file);
        $matchedAffiliates = [];
        // Iterate through each line od document
        foreach ($documentLines as $line) {
            $jsonData = json_decode($line);
            if ($jsonData !== null) {
                $distance = new Distance();
                $distance = $distance->greatCircleDistance($jsonData->latitude, $jsonData->longitude);
                if ($distance <= 100) {
                    array_push($matchedAffiliates, $jsonData);
                }
            }
        }
        return $matchedAffiliates;
    }
}
