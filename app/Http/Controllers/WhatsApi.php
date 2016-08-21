<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use WhatsapiTool;

class WhatsApi extends Controller
{
    public function register($number){
        $type = 'sms';
        $response = WhatsapiTool::requestCode($number, $type);

        return response()->json(compact('response'));
    }
}
