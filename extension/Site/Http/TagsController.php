<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2/5/19
 * Time: 4:30 PM
 */

namespace Extension\Site\Http;


use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Hierarchy\Tags\TagRepository;
use Reactor\Hierarchy\Node;

class TagsController extends PublicController
{

    use UsesNodeHelpers, UsesNodeForms, UsesTranslations;


    public function getPopularTags($limit=5){

        $result = Tag::sortable()->where('status',50)->where('popular',1)->get();
        $tags = [];
        foreach ($result as $tag){
            $tags[] = [
                'title' => $tag->title,
                'slug' => $tag->tag_name
            ];
        }

        return $tags;
    }

    /**
     * Shows the tag page
     *
     * @param string $tags
     * @param string $name
     * @return View
     */
    public function getTag($params = null)
    {


        $params = explode('/', $params);

        $tag = '';
        $location = '';
        if(count($params) == 1) {

            $tag = Tag::withName($params[0])->first();
            if($tag) {
                $nodes = $tag->nodes();
            }else{
                $nodes = null;
            }

        }
        if(count($params) == 2){


            $tag = Tag::withName($params[1])->first();

            $location = Node::withName($params[0])->first();

            if($tag == null || $location == null) {
                $nodes = null;

            }else{
                $nodes = $tag->nodes();

                $nodes = $nodes->findMetaValue($location->getKey());

            }


        }
        if($nodes != null){
            $nodes = $nodes->Published()->whereHas('metas')->sortable('created_at', 'desc')->get();
        }else{

            $nodes = [];
        }

        $posts = [];
        if(count($nodes) > 0) {
            foreach ($nodes as $node) {

                /*Image*/
                $img = $node->getImages()->where('img_type','profile')->first();

                $path = 'https://dummyimage.com/300x200/f0f0f0/fff.png&text=Profile';
                if($img){
                    $path = asset('uploads/'.$img->path);
                }

                /*Tags*/
                
                $tags = $node->tags()->get();


                $posts[] = [
                    'id' =>  $node->getKey(),
                    'title' => trim($node->getTitle()),
                    'slug' => trim($node->getName()),
                    'description' => strip_tags(str_limit($node->business_description,100)),
                    'address' => $node->business_address,
                    'location' => getBusinessLocation($node->getKey()),
                    'tags' => $tags,
                    'zipcode' => $node->business_zipcode,
                    'logo' => $path
                ];


            }
        }



        $data['business'] = $posts;
        $data['tag'] = ($tag ? $tag->title : $params[0]);
        $data['location'] = $location ? $location->getTitle() : '';




      return $data;
    }
}