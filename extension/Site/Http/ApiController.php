<?php

namespace Extension\Site\Http;

use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use ReactorCMS\Entities\Settings;

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

    public function getPages()
    {
        # code...
        $data = [];
        $nodes = Node::withType('pages')->published()->translatedIn(locale())->get();

        foreach ($nodes as $node) {
            $data[] = [
                'id' => $node->getKey(),
                'title' => $node->getTitle(),
                'content' => $node->content,
                'meta_title' => $node->getMetaTitle(),
                'meta_description' => $node->getMetaDescription(),
                'meta_keywords' => $node->getMetaKeywords(),
            ];
        }

        return $data;
    }

    /**
     * get Web Settings
     */
    public function getSettings(){

        $data =[];
        $settings = Settings::all();

        foreach($settings as $setting){
            $data[] = [
                'variable' => $setting->variable, 
                'value' => $setting->value, 
            ];
        }
        
        return $data;
    }
}
