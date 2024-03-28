<?php

namespace App\Http\Controllers;


class Sort extends Controller
{
    public static function sortArray($array, $key, $sorting)
    {
        $collection = collect($array);

        // Sort the collection 
        if ($sorting === 'asc') {
            $sortedCollection = $collection->sortBy($key);
        } else {
            $sortedCollection = $collection->sortByDesc($key);
        }

        return $sortedCollection->all();
    }
}
