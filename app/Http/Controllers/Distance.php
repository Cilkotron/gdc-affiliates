<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Distance extends Controller
{
    public function greatCircleDistance($lat, $lng)
    {
        // Radius of the Earth in kilometers (for Europe)
        $earthRadiusKm = 6371;
        $dublinLatitude = 53.3340285;
        $dublinLongitude = -6.2535495;

        // Convert latitude and longitude from degrees to radians
        $lat1Rad = deg2rad($dublinLatitude);
        $lon1Rad = deg2rad($dublinLongitude);
        $lat2Rad = deg2rad($lat);
        $lon2Rad = deg2rad($lng);

        // Calculate differences
        $latDiff = $lat2Rad - $lat1Rad;
        $lonDiff = $lon2Rad - $lon1Rad;

        $greatCircleDistance = $this->haversineFormula($latDiff, $lonDiff, $lat1Rad, $lat2Rad);
        $distance = $earthRadiusKm * $greatCircleDistance;

        return $distance;
    }
    private function haversineFormula($latDiff, $lonDiff, $lat1Rad, $lat2Rad)
    {
        // Calculate Great-circle distance using Haversine formula
        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos($lat1Rad) * cos($lat2Rad) *
            sin($lonDiff / 2) * sin($lonDiff / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $c;
    }
}
