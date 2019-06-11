<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:10 PM
 */

namespace extension\Site\Http;

use Extension\Site\Entities\Appointment;
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
}