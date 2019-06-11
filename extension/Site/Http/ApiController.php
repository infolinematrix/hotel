<?php

namespace Extension\Site\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;

class ApiController extends PublicController
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    /**
     * Shows a page
     *
     * @param NodeRepository $nodeRepository
     * @param string $name
     * @return View
     */
    public function getPage(NodeRepository $nodeRepository, $name)
    {
        $node = $nodeRepository->getNodeAndSetLocale($name);

        $data = [
            'title' => $node->getTitle(),
            'content' => $node->content,
            'meta_title' => $node->getMetaTitle(),
            'meta_description' => $node->getMetaDescription(),
            'meta_keywords' => $node->getMetaKeywords(),
        ];

        return $data;
    }

    /**
     * Shows the search page
     *
     * @param string $search
     * @param NodeRepository $nodeRepository
     * @param Request $request
     * @return View
     */
    public function getSearch($search, NodeRepository $nodeRepository, Request $request)
    {
        set_app_locale_with('search', $search);
        $results = $nodeRepository->searchNodes($request->input('q'));

        return view('search', compact('results'));
    }



    public function getBanner($homepage = false, $limit = 2)
    {

        if ($homepage == true) {

            $node = Node::WhereExtensionAttribute('banner', 'show_home', 1);
        } else {

            $node = Node::WhereExtensionAttribute('banner', 'show_home', 0);
        }
        $nodes = $node->take($limit)->get();

        $data = [];
        if (count($nodes) > 0) {

            foreach ($nodes as $node) {
                $data[] = [

                    'title' => $node->getTitle(),
                    'link' => $node->web_link,
                    'path' => asset('/uploads/' . $node->getImages()->first()->path),
                ];
            }
        }

        return $data;

    }

   

}
