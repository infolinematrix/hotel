<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 4/4/17
 * Time: 12:42 PM
 */
use Reactor\Hierarchy\Node;
use Reactor\Documents\Media\Media;

if (!function_exists('getBusinessLocation')) {

    function getBusinessLocation($node_id)
    {

        $node = Node::find($node_id);



        $locations = $node->getMeta('locations');


        if($locations) {
            $locations = explode(",",$locations->value);



            rsort($locations);
            $loca = '';
            foreach ($locations as $key => $value) {



                $loca .= Node::withType('locations')->where('id', $value)->first()->getTitle() . ', ';
            }

            
            $length = strlen(trim($loca));
            $location = substr_replace($loca, '', $length - 1, $length);
            return $location;


        }else{

            return null;
        }
    }

    function location_array($node_id)
    {

        $node = Node::find($node_id);
        $locations = $node->getMeta('location');
        $loca = [];
        foreach ($locations as $location) {

            $loca[] = Node::withType('locations')->where('id', $location)->first()->getTitle();
        }

        return $loca;
    }

    function getSpeciality($node_id)
    {
        $node = Node::find($node_id);
        $speciality[] = $node->getMeta('category');

        $result = [];
        foreach ($speciality as $row) {

            $result[] = Node::withType('categories')->where('id', $row)->first()->getTitle();
        }

        return $result;
    }


}
if (!function_exists('getProfileimage')) {

    function getProfileimage($node_id)
    {
        $image = Media::where('node_id', $node_id)->where('type', 'image')->first();
        if ($image) {

            $image = $image->path;
        } else {

            $image = null;
        }

        return $image;
    }
}

if (!function_exists('getReviewrating')) {

    function getReviewrating($node)
    {

        $star_1 = $node->reviews()->where('rating', '1')->first();
        if ($star_1) {

            $star_1 = $node->reviews()->where('rating', '1')->count();

        }
        $star_2 = $node->reviews()->where('rating', '2')->first();
        if($star_2){

            $star_2 = $node->reviews()->where('rating', '2')->count();
        }
        $star_3 = $node->reviews()->where('rating', '3')->first();
        if($star_3){

            $star_3 = $node->reviews()->where('rating', '3')->count();
        }

        $star_4 = $node->reviews()->where('rating', '4')->first();
        if($star_4){

            $star_4 =$node->reviews()->where('rating', '4')->count();
        }

        $star_5 = $node->reviews()->where('rating', '5')->first();
        if($star_5){

            $star_5 = $node->reviews()->where('rating', '5')->count();
        }
        $count = $star_1 + $star_2 + $star_3 + $star_4 + $star_5;



        if ($count != 0) {
            $ratting = ($star_1 + $star_2 * 2 + $star_3 * 3 + $star_4 * 4 + $star_5 * 5) / $count;



        } else {
            $ratting = ($star_1 + $star_2 * 2 + $star_3 * 3 + $star_4 * 4 + $star_5 * 5) / 1;
        }

        return $ratting;

    }
}

if (!function_exists('getReviewratingCount')) {

    function getReviewratingCount($node,$rating=0)
    {


       $rating = $node->reviews()->where('rating', $rating)->count();


        return $rating;

    }
}
