<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config; 
use Illuminate\Support\Arr;
use App\Traits\FileRead; 
use App\Traits\Distance; 
use App\Traits\ParseAffiliates;


class Affiliate extends Model
{
    use FileRead, Distance, ParseAffiliates;

    public static function getAffiliates() :array 
    {
        $file = self::readFromFile(Config::get('affiliates.filename'));

        $matchedAffiliates = self::parseAffiliates($file, Config::get('affiliates.radius'));

        $sortedObjects = Arr::sort($matchedAffiliates, 'affiliate_id'); 

        return $sortedObjects;
    }

}

