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


    public function booking(){

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
}
