<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;


class AffiliateController extends Controller
{
    public static function index()
    {
        $affiliates = Affiliate::getAffiliates();
        return $affiliates;
    }
}
