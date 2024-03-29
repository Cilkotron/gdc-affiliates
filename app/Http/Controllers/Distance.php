<?php

namespace App\Http\Controllers;


class Distance extends Controller
{
    const EARTH_RADIUS_KM = 6371; 
    
    public static function greatCircleDistance(string $lat, string $lng, string $dublinLatitude, string $dublinLongitude): string
    {
    
        // Convert latitude and longitude from degrees to radians
        $lat1Rad = deg2rad($dublinLatitude);
        $lon1Rad = deg2rad($dublinLongitude);
        $lat2Rad = deg2rad($lat);
        $lon2Rad = deg2rad($lng);

        // Calculate differences
        $latDiff = $lat2Rad - $lat1Rad;
        $lonDiff = $lon2Rad - $lon1Rad;

        $greatCircleDistance = self::haversineFormula($latDiff, $lonDiff, $lat1Rad, $lat2Rad);
        $distance = self::EARTH_RADIUS_KM * $greatCircleDistance;

        return $distance;
    }
    
    private static function haversineFormula(string $latDiff, string $lonDiff, string $lat1Rad, string $lat2Rad): string
    {
        // Calculate Great-circle distance using Haversine formula
        $formula = sin($latDiff / 2) * sin($latDiff / 2) + cos($lat1Rad) * cos($lat2Rad) * sin($lonDiff / 2) * sin($lonDiff / 2);
        $distance = 2 * atan2(sqrt($formula), sqrt(1 - $formula));
        return $distance; 

    }
}
