<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2/5/18
 * Time: 2:01 PM
 */

namespace extension\Site\Http\Backend;

use Illuminate\Http\Request;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\ReactorController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Documents\Media\Media;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\Auth;
use Extension\Site\Entities\Booking;
use Extension\Site\Entities\Transactions;
use SebastianBergmann\Comparator\Book;

class BookingController extends ReactorController
{
    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    public function __construct()
    {

    }


    public function history(){

        $roomtype = Node::withType('roomtype')->get();
        $nodes = Booking::orderBy('id','DESC')
            ->paginate(100);
        return view('Site::backend.booking.index', compact('roomtype','nodes'));

    }


    public function bookingView($id){

        $booking = Booking::find($id);

        $transaction = Transactions::where('booking_id',$booking->booking_id)->first();

        return view('Site::backend.booking.booking_view', compact('booking','transaction'));
    }

    public function search(Request $request){


        $roomtype = Node::withType('roomtype')->get();

        $to_date = date('Y-m-d',strtotime($request->check_out));
        $from_date = date('Y-m-d',strtotime($request->check_in));
        $type = $request->room_type;


        if($type) {
            $nodes = Booking::where('check_in', '<', $to_date)
                ->where('check_out', '>=', $from_date)
                ->where('check_in', '<', $to_date)
                ->where('check_out', '>', $from_date)
                ->where('type', $type)
                ->paginate(100);
        }else{

            $nodes = Booking::where('check_in', '<', $to_date)
                ->where('check_out', '>=', $from_date)
                ->where('check_in', '<', $to_date)
                ->where('check_out', '>', $from_date)
                ->paginate(100);
        }
        return view('Site::backend.booking.index', compact('roomtype','nodes'));
    }
    public function transaction()
    {
        $nodes = Transactions::orderBy('id','DESC')
            ->paginate(100);
        return view('Site::backend.booking.transaction', compact('nodes'));

    }

    public function view($id)
    {
        $transaction = Transactions::find($id);

        $booking = Booking::where('booking_id',$transaction->booking_id)->get();

        return view('Site::backend.booking.view', compact('transaction','booking'));

    }


    public function check(){

        $roomtype = Node::withType('roomtype')->get();

        return view('Site::backend.booking.room', compact('roomtype'));

    }

    public function checking(Request $request){



        $to_date = date('Y-m-d',strtotime($request->check_out));
        $from_date = date('Y-m-d',strtotime($request->check_in));
        $type = $request->room_type;

        $nodes = Booking::where('check_in', '<', $to_date)
            ->where('check_out', '>=', $from_date)
            ->where('check_in', '<', $to_date)
            ->where('check_out', '>', $from_date)
            ->where('type', $type)
            ->sum('no_of_rooms');



        $rooms = Node::find($type);


        if($rooms->no_of_rooms > $nodes){
            $data = [

                'check_in' => $from_date,
                'check_out' => $to_date,
                'type' => $type,
                'no_of_rooms' => ($rooms->no_of_rooms - $nodes)
            ];

            \Session::put('booking',$data);
            return redirect()->route('reactor.booking.available');

        }else{

            return redirect()->back()->with('message', "Sorry! no rooms are available...");

        }
    }

    public function available(){


        $data = \Session::get('booking');



        $room = Node::find($data['type']);

        $check_in = $data['check_in'];
        $check_out = $data['check_out'];


        $no_of_rooms = $data['no_of_rooms'];


        return view('Site::backend.booking.available', compact('room','check_in','check_out','no_of_rooms'));
    }

    public function process(Request $request){


        $check_in = $request->check_in;
        $check_out = $request->check_out;

        $datetime1 = date_create($check_in);
        $datetime2 = date_create($check_out);
        $days = date_diff($datetime1, $datetime2);


        $rand = rand(111111,99999);
        $room = Node::find($request->type);

        $booking_details = [
            'booking_id' => $rand,
            'type' => $room->getKey(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'rate' => $room->price,
            'total_amount' => ($days->days * $request->no_of_rooms * $room->price),
            'check_in' => $check_in,
            'check_out' => $check_out,
            'no_of_rooms' => $request->no_of_rooms,

        ];


        \Session::put('booking_details',$booking_details);

        return view('Site::backend.booking.details', compact('booking_details'));

    }



    public function confirmed() {

        $booking = \Session::get('booking_details');


        $data = [
            'booking_id' => $booking['booking_id'],
            'type' => $booking['type'],
            'first_name' => $booking['first_name'],
            'last_name' => $booking['last_name'],
            'phone' => $booking['phone'],
            'email' => $booking['email'],
            'rate' => $booking['rate'],
            'total_amount' => $booking['total_amount'],
            'check_in' => $booking['check_in'],
            'check_out' => $booking['check_out'],
            'no_of_rooms' => $booking['no_of_rooms'],

        ];

        Booking::insert($data);

        $booking_ID = $booking['booking_id'];
        return view('Site::backend.booking.success', compact('booking_ID'));
    }
}
