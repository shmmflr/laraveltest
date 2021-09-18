<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImages($file, $location)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = public_path($location);
        $file->move($path, $fileName);
        return $location . $fileName;
    }
}
