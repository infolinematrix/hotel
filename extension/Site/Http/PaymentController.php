<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 8/4/19
 * Time: 4:37 PM
 */

namespace Extension\Site\Http;


use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\PublicController;
use Illuminate\Support\Facades\DB;
use Extension\Site\Entities\Transactions;
use Instamojo\Instamojo;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends PublicController
{
    public $mode = 'LIVE';

    //public $api = 'test_4fc28ab0f0ab8045f72ad419087';
    //public $auth_tocken = 'test_4356f3381134caf99f7976f178f';

    public $api = 'test_4fc28ab0f0ab8045f72ad419087';
    public $auth_token = 'test_4356f3381134caf99f7976f178f';
    public $endpoint = 'https://test.instamojo.com/api/1.1/';

    
   /* 
    public function AuthPayment(Request $request){

        $txn = new Transactions();
        $txn->provider = 'paypal';
        $txn->node_id = $request->node_id;
        $txn->txn_id = $request->txn_id;
        $txn->amount = $request->total;

        $txn->save();
        

        $promo = new Promotions();
        $promo->node_id = $request->node_id;
        $promo->txn_id = $request->txn_id;
        $promo->cpc = $request->cpc;
        $promo->max_clicks = $request->clicks;
        $promo->save();

        return $request->txn_id;
    }

    public function checkout($provider, Request $request){

        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername(config('services.paypal.username'));
        $gateway->setPassword(config('services.paypal.password'));
        $gateway->setSignature(config('services.paypal.signature'));
        $gateway->setTestMode(config('services.paypal.sandbox'));
        //$gateway->setReturnUrl('http://localhost:8000/api/checkout/authorised/PayPal_Express');
        
        
        $response = $gateway->purchase(array(
            'amount' => '10.00', 
            'currency' => 'USD', 
            'cancelUrl' => 'https://www.example.com/cancel', 
            'returnUrl' => 'http://localhost:8000/api/checkout/authorised/PayPal_Express',
            //'returnUrl' => 'https://www.example.com/cancel',
            ))->send();

            //$url = $response;
            //dd($url);

        return $response;

    }
*/
    public function handleProviderCallback($provider, Request $request)
    {
        $api = new Instamojo(
            $this->api,
            $this->auth_token,
            $this->endpoint
        );

        try {
            $response = $api->paymentRequestCreate(array(
                'purpose' => 'Promotion',
                'amount' => 100, //$request->amount,
                'buyer_name' => 'Subha Das', //$request->first_name.' '.$request->last_name,
                'send_email' => false,
                'send_sms' => false,
                'email' => 'subha@gmail.com', //$request->email,
                'phone' => '9832893116',
                'allow_repeated_payments' => false,
                "redirect_url" => route('checkout.redirect', $provider)
            ));
            
            return $response;
        }
        catch (Exception $e) {
            return ['error' =>  $e->getMessage()];
        }

    }
    
    
    public function handleProviderRedirect($provider, Request $request)
    {
        # code...
        #"payment_id":"MOJO9618D05A60773321","payment_status":"Credit","payment_request_id":"08bf3b320ae34ce78b4c65887eea4c30"

        if($request && $request->payment_status == "Credit"){
            
            $txn = Transactions::insert([
                'purpose' => 'Delux Room',
                'node_id' => 112,
                'provider' => $provider,
                'txn_id' => $request->payment_id,
                'payment_request_id' => $request->payment_request_id,
                'amount' => 1250,
                'payer_first_name' => 'Subha Sundar',
                'payer_last_name' => 'Das',
                'payer_email' => 'subha@gmail.com',
                'payer_contact' => '9832893116'
            ]);
            
            $url = "http://localhost:3000/payment/".$request->payment_request_id;
            return Redirect::away($url);
            
        }
        
        $url = "http://localhost:3000/payment/failed";
        return Redirect::away($url);
    }


    public function getTransaction($transaction)
    {
        # code...
        //    dd($transaction);
        $txn = Transactions::where('payment_request_id', trim($transaction))->first();
        if($txn){
            return $txn;
        }else{
            return false;
        }    
    }

    

}