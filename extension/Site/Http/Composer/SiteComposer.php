<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/6/17
 * Time: 2:46 PM
 */

namespace Extension\Site\Http\Composer;


use  ReactorCMS\Entities\Node;

class SiteComposer
{



    public function compose($view)
    {

	
    }

    public function blogs(){

        return Node::withType('blog')
            ->translatedIn(locale())
            ->sortable()
            ->paginate(15);

    }
}
