<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($success,$message,$object,$status = 200,$headers = Array()){
        return response()->json([
           'success' => $success,
           'message' => $message,
           'response' => $object,
            ],$status,$headers);
    }
}
