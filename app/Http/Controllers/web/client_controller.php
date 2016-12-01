<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use libphonenumber\geocoding\PhoneNumberOfflineGeocoder;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberToCarrierMapper;
use libphonenumber\PhoneNumberToTimeZonesMapper;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\ShortNumberInfo;
use Redirect;
use SyncResult;
use URL;
use WhatsProt;

class client_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['add_client_view_auth','index']);
    }

    public function index()
    {
        $user = Auth::user();

        $clients = $user->Clients;

        $data = array(
            'clients' => $clients
        );

        return response()->view('elements.client.list_clients', $data);
    }

    public function add_client_view_auth()
    {

        $data = array(
            'user' => Auth::user()
        );

        return response()->view('elements.client.new_client', $data);
    }

    public function add_client_view(User $user)
    {
        $data = array(
            'user' => $user
        );
        return response()->view('elements.client.new_client', $data);
    }

    public function add_client(Request $request, User $user)
    {

        try {
            $number = $request->input('phone_number');

            $phoneNumberUtil = PhoneNumberUtil::getInstance();

            $phoneNumber = $phoneNumberUtil->parse($number, "", null, true);

            $phoneNumberRegion = $phoneNumberUtil->getRegionCodeForNumber($phoneNumber);

            $phoneInformation = $phoneNumberUtil->parse($number,$phoneNumberRegion);

        } catch (NumberParseException $exception) {

            return response()->redirectTo(URL::previous())->with('message', $exception->getMessage());

        }


        $this->validate($request, [
            'client_name' => 'required',
            'phone_number' => 'required|phone:AUTO|unique:clients',
        ]);

        $user->Clients()->create([
            'client_name' => $request->input('client_name'),
            'country_code' => $phoneInformation->getCountryCode(),
            'phone_number' => $phoneInformation->getNationalNumber(),
        ]);

        return back()->with('error_message', 'new_client_has_been_added');

    }

    public function verifier_whats_app_number($user,$number){

        $user = User::find($user);

        $account = $user->randWhatsAccount;

        //return response()->json($account);


        $wa = new WhatsProt($account[0]->login, $user->name, false);

        $wa->connect();
        $wa->loginWithPassword($account[0]->pw);

        //$wa->sendSync($number);

        var_dump($wa);
    }
}
