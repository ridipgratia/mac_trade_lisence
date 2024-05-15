<?php

namespace App\Mymodules;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MyModules
{
    public function __construct()
    {
    }
    // ------------------ store files ---------------------
    public static function storeFiles($files, $location)
    {
        foreach ($files as $key => $value) {
            $url = $value->store('public/documents/new_trade/' . $location . "/");
            $files[$key] = $url;
        }
        return $files;
    }
    // ------------------ storage folder delete ----------------
    public static function deleteFolder($location)
    {
        if (Storage::exists('public/documents/new_trade/' . $location)) {
            Storage::deleteDirectory('public/documents/new_trade/' . $location);
        }
    }
    // ------------------- check verify number exists ---------------
    public static function checkVerifyNumberExists($number)
    {
        try {
            $check = DB::table('verified_mobile')
                ->where('phone_number', $number)
                ->count();
            return $check;
        } catch (Exception $err) {
            return false;
        }
    }
}
