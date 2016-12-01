<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WhatsapiTool;

class WhatsApi extends Controller
{
    public function register(Request $request){
        $type = $request->input('type');
        $number = $request->input('number');
        $response = WhatsapiTool::requestCode($number, $type);
        return response()->json(compact('response'));
    }

    public function verification(Request $request){
        $number = $request->input('number');
        $code = $request->input('code');

        $response = WhatsapiTool::registerCode($number, $code);

        if($response->status == 'ok'){

        }

        return response()->json(compact('response'));

        /*
         * {"response":{"status":"ok","login":"15012708426","type":"new","pw":"HLZ6qfhDVcuX79zVoUaK\/pvZlhM=","expiration":4444444444,"kind":"free","price":"$0.99","cost":"0.99","currency":"USD","price_expiration":1483133368}}
         * */
    }
}
