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


class RoomTypeController extends PublicController
{

    use UsesNodeHelpers, UsesNodeForms, UsesTranslations;
    use UseAppHelper;



    public function getRoomtype(){

        $data = [];

        $nodes = Node::withType('roomtype')->sortable()->published()->translatedIn(locale())->get();

        foreach ($nodes as $node){

            $img = $node->getImages()->first();

            $data[] = [

                'title' => $node->getTitle(),
                'slug' => $node->getName(),
                'description' => $node->description,
                'image' => $img->path,
                'price' => $node->price
            ];
        }

        return $data;

    }

    public function index(NodeRepository $nodeRepository, $name){

        $node = $nodeRepository->getNodeAndSetLocale($name, true, false);

        $data['node'] = [
            'id' => $node->getKey(),
            'title' => $node->getTitle(),
            'descrription' => $node->description,
            'no_of_rooms' => $node->no_of_rooms,
            'price' => $node->price
        ];

        return $data;
    }


    public function checkAvailibility(Request $request){


        $from_date = '2019-06-20';
        $to_date = '2019-06-25';
        $type = 1117;
        $rooms = 2;

        $room_type = Node::find($type);

        $booked_rooms = Booking::where('check_in','<',$to_date)
                                ->where('check_out','>=',$from_date)
                                ->where('check_in','<',$to_date)
                                ->where('check_out','>',$from_date)
                                ->where('type',$type)
                                ->sum('no_of_rooms');

        $total_room = ($room_type->no_of_rooms - $booked_rooms);

        if($total_room > 0){

            return $total_room." rooms are available...";

        }else{

            return 'No rooms available';
        }



    }
    public function checkOut(Request $request){


        $data = [

            'type' => 1117,
            'no_of_rooms' => 2,
            'from_date' => '2019-06-11',
            'to_date' => '2019-06-12',
            'rate' => 2500 
        ];
        
        Booking::insert($data);

        return 'Confrimed';
    }
}