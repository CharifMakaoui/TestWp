<?php

namespace App\Http\Controllers\web;

use App\WhatsAccount;
use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use League\Flysystem\Exception;
use Redirect;
use WhatsapiTool;

class whatsAccounts_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $accounts = $user->whatsAccounts;

        $data = array(
            'accounts' => $accounts,
        );

        //return response()->json($data);

        return response()->view('elements.whatsapp.accounts_list',$data);
    }

    public function send_to_get_validation_view(){
        return response()->view('elements.whatsapp.account_send_verification');
    }

    public function send_to_get_validation(Request $request)
    {
        $type = $request->input('type');
        $number = $request->input('number');
        $response = WhatsapiTool::requestCode($number, $type);


        if ($response->status == 'ok'){
            try{
                if($response->type == "existing"){
                    $account = new WhatsAccount();
                    $account->user_id = Auth::user()->id;
                    $account->login = $response->login;
                    $account->type = $response->type;
                    $account->pw = $response->pw;
                    $account->expiration = $response->expiration;
                    $account->kind = $response->kind;
                    $account->price = $response->price;
                    $account->cost = $response->cost;
                    $account->currency = $response->currency;
                    $account->price_expiration = $response->price_expiration;

                    $account->saveOrFail();

                    return response()->redirectTo('me/accounts');
                }
            }
            catch (Exception $exception){
                return response()->redirectToRoute('validateWhatsAppAccount_view',['number' => $number]);
            }

            return response()->redirectToRoute('validateWhatsAppAccount_view',['number' => $number]);
        }
        else{
            return Redirect::back()->withErrors(['message' => '']);
        }
    }

    public function send_validate_account_view($number){
        return response()->view('elements.whatsapp.account_validate_code',['number' => $number]);
    }

    public function send_validate_account(Request $request,$number){

        $code = $request->input('code');

        $response = WhatsapiTool::registerCode($number, $code);

        if($response->status == 'ok'){

            $account = new WhatsAccount();
            $account->login = $response->login;
            $account->type = $response->type;
            $account->pw = $response->pw;
            $account->expiration = $response->expiration;
            $account->kind = $response->kind;
            $account->price = $response->price;
            $account->cost = $response->cost;
            $account->currency = $response->currency;
            $account->price_expiration = $response->price_expiration;


            $save = Auth::user()->whatsAccounts()->save($account);
            if($save)
                return response()->redirectToRoute('allMyWhatsAppAccounts');

            else
                return Redirect::back()->withErrors(['message' => 'Error_Save_Account']);

        }

        return Redirect::back()->withErrors(['message' => 'Error_activating_Account']);

    }

}
