<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:10 PM
 */

namespace extension\Site\Http;

use Extension\Site\Entities\Appointment;
use Extension\Site\Entities\Booking;
use Extension\Site\Entities\Contact;
use extension\Site\Helpers\UseAppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image as ImageFacade;
use Mail;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Documents\Media\Media;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\NodeSource;
use SebastianBergmann\Comparator\Book;
use Instamojo\Instamojo;

class RoomTypeController extends PublicController
{

    use UsesNodeHelpers, UsesNodeForms, UsesTranslations;
    use UseAppHelper;

    public $api = 'test_4fc28ab0f0ab8045f72ad419087';
    public $auth_tocken = 'test_4356f3381134caf99f7976f178f';

    public $endpoint = 'https://test.instamojo.com/api/1.1/';



    public function getRoomtype(){

        $data = [];

        $nodes = Node::withType('roomtype')->sortable()->published()->translatedIn(locale())->get();



        foreach ($nodes as $node){

            $img = $node->getImages()->first();

            $data[] = [

                'title' => $node->getTitle(),
                'slug' => $node->getName(),
                'description' => plainText($node->description,100),
                'image' => $img->path,
                'price' => $node->price
            ];
        }

        return $data;

    }

    public function index(NodeRepository $nodeRepository, $name){

        $node = $nodeRepository->getNodeAndSetLocale($name, true, false);

        $no_of_rooms = $node->no_of_rooms;

        $no = [];
        for($i = 1; $i<=$no_of_rooms; $i++) {
            $no[] = $i;
        }

        $data['node'] = [
            'id' => $node->getKey(),
            'title' => $node->getTitle(),
            'descrription' => $node->description,
            'no_of_rooms' => $no,
            'price' => $node->price
        ];

        return $data;
    }


    public function checkAvailibility(Request $request){


        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $type = $request->type;
        $rooms = $request->no_room;

        $room_type = Node::find($type);

        $booked_rooms = Booking::where('check_in','<',$to_date)
                                ->where('check_out','>=',$from_date)
                                ->where('check_in','<',$to_date)
                                ->where('check_out','>',$from_date)
                                ->where('type',$type)
                                ->sum('no_of_rooms');

        $total_room = ($room_type->no_of_rooms - $booked_rooms);


        if($total_room > 0){

            if($total_room >= $rooms) {

                $data = 'yes';
                return $data;
            }else{
                $data = 'no';
                return $data;
            }

        }else{

            $data = 'no';
            return $data;
        }



    }
    public function checkOut(Request $request){


        $carts = $request->carts;

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

           // return $data;
           // Booking::insert($data);
            //return "HELLO";
          
           
        }


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


        return 'Confrimed';
    }
}