<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 8/4/19
 * Time: 4:37 PM
 */

namespace Extension\Site\Http;


use Illuminate\Http\Request;
use Instamojo\Instamojo;
use ReactorCMS\Http\Controllers\PublicController;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\DB;
use Extension\Site\Entities\Transactions;
use Extension\Site\Entities\Promotions;

class PaymentController extends PublicController
{
    
    
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

    public function handleProviderCallback($provider, Request $request)
    {

        dd($provider);

    }
    
    
    public $APIKEY, $TOCKEN, $ENDPOINT;
    public $mode = 'LIVE';

    //public $api = 'test_4fc28ab0f0ab8045f72ad419087';
    //public $auth_tocken = 'test_4356f3381134caf99f7976f178f';

    public $api = 'test_4fc28ab0f0ab8045f72ad419087';
    public $auth_tocken = 'test_4356f3381134caf99f7976f178f';

    public $endpoint = 'https://test.instamojo.com/api/1.1/';




    public function checkout1(Request $request){

        //return $request->all();

        $api = new Instamojo(
            $this->api,
            $this->auth_tocken,
            $this->endpoint
        );

        try {
            $response = $api->paymentRequestCreate(array(
                'purpose' => 'Promotion',
                'amount' => $request->amount,
                'buyer_name' => $request->first_name.' '.$request->last_name,
                'send_email' => false,
                'send_sms' => false,
                'email' => $request->email,
                'phone' => '9832893116',
                'allow_repeated_payments' => false,
                "redirect_url" => "http://www.google.com"
            ));

            return $response;
        }
        catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        return "NONE OF ABOVE";
    }
}