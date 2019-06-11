<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 6/4/19
 * Time: 1:06 PM
 */

namespace extension\Site\Helpers;


use Kris\LaravelFormBuilder\Filters\Collection\Integer;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\PublishedNode;

class AppRepository
{

    public function generate_products_array($nodes){

        $array =[];


        foreach ($nodes as $node){

            /**
             * Default Image
             */
            $default_image = null;
            if ($media = $node->getImages()->first()) {
                if ($media) {
                    $default_image = url('uploads/').'/'.$media->path;
                }
            }

            /**
             * Category Link
             */
            $meta = $node->metas()->where('key', 'category')->orderBy('id', 'desc')->first();
            $category_link = Node::find($meta->value)->getName();

            $array[] = [
                'title' => trim($node->getTitle()),
                'slug' => trim($node->getName()),
                'image' => trim($default_image),
                'category_links' => $category_link
            ];
        }

        return $array;
    }
}