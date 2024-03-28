<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


class Affiliate extends Controller
{
    public static function readFromFile()
    {
        $fileLines = Storage::get('affiliates.txt');

        //Check if document exists 
        if(!$fileLines) {
            abort(404);
        }
        $linesArray = explode("\n", $fileLines);
        $matchedAffiliates = [];
        // Iterate through each line od document
        foreach ($linesArray as $line) {
            $jsonData = json_decode($line);
            if ($jsonData !== null) {
                $distance = new Distance();
                $distance = $distance->greatCircleDistance($jsonData->latitude, $jsonData->longitude);
                if($distance <= 100) {
                    array_push($matchedAffiliates, $jsonData);
                }
            } 
        }
       return $matchedAffiliates;

    }
}
