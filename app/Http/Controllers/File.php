<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class File extends Controller
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
