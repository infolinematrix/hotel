<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 8/4/19
 * Time: 4:37 PM
 */

namespace Extension\Site\Http;


use Extension\Site\Entities\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ReactorCMS\Http\Controllers\PublicController;
use Illuminate\Support\Facades\DB;
use Extension\Site\Entities\Transactions;
use Instamojo\Instamojo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
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


        $carts = $request->carts;
        $total_amount = 0;
        $rand = rand(111111,99999);
        foreach ($carts as $cart){
            $data = [

                'type' => $cart['room_type'],
                'no_of_rooms' => $cart['no_of_rooms'],
                'check_in' => $cart['from_date'],
                'check_out' => $cart['to_date'],
                'rate' => $cart['room_tariff'],
                'total_amount' => ($cart['no_of_rooms'] * $cart['no_of_days'] * $cart['room_tariff']),
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone
            ];

            $booking = Booking::insertGetId($data);

            Booking::where('id',$booking)->update(['booking_id' => $request->phone.$rand]);

            $total_amount+=  ($cart['no_of_rooms'] * $cart['no_of_days'] * $cart['room_tariff']);

        }
        $api = new Instamojo(
            $this->api,
            $this->auth_token,
            $this->endpoint
        );

        try {


            $book = Booking::where('id',$booking)->first();


            $response = $api->paymentRequestCreate(array(
                'purpose' => 'NEW BOOKING #'.$book->booking_id,
                'amount' => $total_amount, //$request->amount,
                'buyer_name' => $request->firstname.' '.$request->lastname, //$request->first_name.' '.$request->last_name,
                'send_email' => false,
                'send_sms' => false,
                'email' => $request->email, //$request->email,
                'phone' => $request->phone,
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


        $api = new Instamojo($this->api, $this->auth_token, $this->endpoint);

        $response = $api->paymentRequestStatus(trim($request->payment_request_id));


        $booking_id = $response['purpose'];

        strlen($booking_id);
        $pos=strrpos($booking_id, '#');
        $bookingid= substr($booking_id,$pos+1);


        $booking = Booking::where('booking_id',$bookingid)->first();


        if($request && $request->payment_status == "Credit"){


            Transactions::insert([
                'purpose' => $response['purpose'],
                'booking_id' => $booking->booking_id,
                'provider' => $provider,
                'txn_id' => $request->payment_id,
                'payment_request_id' => $request->payment_request_id,
                'amount' => $response['amount'],
                'payer_first_name' => $booking->first_name,
                'payer_last_name' => $booking->last_name,
                'payer_email' => $booking->email,
                'payer_contact' => $booking->phone
            ]);

            $url = env('CLIENT_URL').'/payment/'.$request->payment_request_id;
            return Redirect::away($url);

        }


        //100463762879

        $url = env('CLIENT_URL')."/payment/failed";
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