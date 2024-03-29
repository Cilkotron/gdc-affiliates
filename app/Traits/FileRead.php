<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait FileRead
{
    public static function readFromFile($fileName) {
    
        $fileLines = Storage::get($fileName);

        //Check if document exists 
        if (!$fileLines) {
            abort(404);
        }
        return $fileLines; 

    }
}
