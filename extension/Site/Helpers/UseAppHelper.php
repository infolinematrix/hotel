<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 24/10/18
 * Time: 1:17 PM
 */

namespace extension\Site\Helpers;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\NodeType;
use Reactor\Hierarchy\Node;
use ReactorCMS\Entities\NodeMeta;

trait UseAppHelper
{

    use FormBuilderTrait;


    public function getNodesResults($mode = '',$node, $type, $entities, $searchKey = '',$nodeRepository){


        if($mode == 'PRODUCT') {

            if($type != null){


                if($node && $entities != null) {
                    $companies = Node::WhereExtensionAttribute('businesstype', 'business_type', $type)
                        ->Join('node_meta as NM', 'NM.node_id', 'nodes.id')
                        ->where('NM.key', 'location')
                        ->where('NM.value', $node->getKey())
                        ->Join('node_meta as NM1', 'nodes.id', '=', 'NM1.node_id')
                        ->where('NM1.key', 'entity')
                        ->where('NM1.value', $entities)
                        ->get();


                }
                if(!$node && $entities != null){

                    $companies = NodeMeta::WhereExtensionAttribute('businesstype', 'business_type', $type)
                        ->Join('nodes as N','N.id','=','node_meta.node_id')
                        ->where('node_meta.key','entity')
                        ->where('node_meta.value',$entities)
                        ->get();
                }

                if($node && $entities == null){
                    $companies = NodeMeta::WhereExtensionAttribute('businesstype', 'business_type', $type)
                        ->Join('nodes as N','N.id','=','node_meta.node_id')
                        ->where('node_meta.key','location')
                        ->where('node_meta.value',$node->getKey())
                        ->get();

                }

            }else {


                if ($node && $entities != null) {

                    $companies = Node::withType('businesstype')->Join('node_meta as NM', 'nodes.id', '=', 'NM.node_id')
                        ->where('NM.key', 'location')
                        ->where('NM.value', $node->getKey())
                        ->Join('node_meta as NM1', 'nodes.id', '=', 'NM1.node_id')
                        ->where('NM1.key', 'entity')
                        ->where('NM1.value', $entities)
                        ->get();

                }

                if ($node && $entities == null) {
                    $companies = NodeMeta::Join('nodes as N', 'N.id', '=', 'node_meta.node_id')
                        ->where('node_meta.key', 'location')
                        ->where('node_meta.value', $node->getKey())
                        ->get();

                }

                if (!$node && $entities) {
                    $companies = NodeMeta::Join('nodes as N', 'N.id', '=', 'node_meta.node_id')
                        ->where('node_meta.key', 'entity')
                        ->where('node_meta.value', $entities)
                        ->get();
                }
            }


            if (count($companies) != 0) {

                foreach ($companies as $cMeta) {
                    $nodemeta[] = $cMeta->node_id;
                }

                foreach ($nodemeta as  $value) {

                    $company = $nodeRepository->getNodeById($value, true);

                    $company_products = $company->children()
                        ->withType('producttype')
                        ->translatedIn(locale())
                        ->search($searchKey, 20, true)
                        ->get();
                    if (count($company_products) > 0) {
                        foreach ($company_products as $meta) {
                            $node_ids[] = $meta->getKey();
                        }
                    } else {

                        $node_ids[] = null;
                    }


                }
            }else{

                $node_ids[] = null;
            }
        }


        if($mode == 'COMPANY') {
            if($node && $entities != null){

                $companies = Node::withType('businesstype')
                    ->Join('node_meta as E', 'E.node_id', '=', 'nodes.id')
                    ->where('E.key', 'entity')
                    ->where('E.value', $entities)
                    ->Join('node_meta as L','L.node_id', '=', 'nodes.id')
                    ->where('L.key','location')
                    ->where('L.value',$node->getKey())
                    ->search($searchKey, 20, true)
                    ->get();

            }
            if($node && $entities == null) {
                $companies = Node::withType('businesstype')
                    ->Join('node_meta as L', 'L.node_id', '=', 'nodes.id')
                    ->where('L.key', 'location')
                    ->where('L.value', $node->getKey())
                    ->search($searchKey, 20, true)->get();
            }

            if(!$node && $entities != null){

                $companies = Node::withType('businesstype')
                    ->Join('node_meta as E', 'E.node_id', '=', 'nodes.id')
                    ->where('E.key', 'entity')
                    ->where('E.value', $entities)
                    ->search($searchKey, 20, true)->get();



            }
            if (count($companies) > 0) {
                foreach ($companies as $company) {
                    $node_ids[] = $company->node_id;
                }
            } else {
                $node_ids[] = null;
            }
        }

        return $node_ids;

    }
    public function getNodeResults($segments = [], $nodeRepository)
    {

        /*If Segment greater than 1*/
        if (count($segments) > 1) {

            /*Get Location Node ID*/
            $location = $nodeRepository->getNode($segments[0], false, false)->getKey();
            /*Get Category Node ID*/
            $category = $nodeRepository->getNode($segments[1], false, false)->getKey();

            /*Get Business Location Node Meta*/
            $locationMeta = NodeMeta::where('type', 'business')
                ->where('key', 'location')
                ->where('value', $location)
                ->get();

            if (count($locationMeta) > 0) {

                foreach ($locationMeta as $meta) {

                    /*Get Companiess NODE*/
                    $company = $nodeRepository->getNodeById($meta->node_id, true);
                    if ($company) {

                        /*Get Products UNDER Companiees*/
                        $company_products = $company->children()
                            ->withType('producttype')
                            ->translatedIn(locale())
                            ->published()
                            ->sortable('id', 'DESC')
                            ->get();


                        /*Get Products Node Id's*/
                        if (count($company_products) > 0) {
                            foreach ($company_products as $nmeta) {
                                $nodeIds[] = $nmeta->getKey();
                            }

                            /*Now Check those product node id's with Category in NodeMeta Table JOIN QUERY*/
                            $nodeMeta = Node::withType('producttype')
                                ->Join('node_meta as P','nodes.id','=','P.node_id')
                                ->whereIn('nodes.id',$nodeIds)
                                ->where('P.key','category')
                                ->where('P.value',$category)
                                ->get();
                            if(count($nodeMeta) > 0){

                                $nodeIds = $nodeMeta;
                            }else{

                                $nodeIds = null;
                            }

                        } else {
                            $nodeIds[] = null;
                        }


                    } else {
                        $nodeIds[] = null;
                    }


                }


            } else {

                $nodeIds[] = null;
            }


        } else { /*If Segment is 1*/


            /*get Browse Results with Location OR Category
            /*Get Node ID*/
            $arr = $nodeRepository->getNode($segments[0], false, false)->getKey();

            /*Get NodeMeta*/
            $nodeMeta = NodeMeta::where('value', $arr)->get();
            if (count($nodeMeta) > 0) {

                foreach ($nodeMeta as $meta) {

                    /*If NodeMeta key == Location*/
                    if ($meta->key == 'location') {

                        /*Get Companies*/
                        $company = $nodeRepository->getNodeById($meta->node_id, true);
                        if ($company) {

                            /*Get Products Under Companies*/
                            $company_products = $company->children()
                                ->withType('producttype')
                                ->translatedIn(locale())
                                ->published()
                                ->sortable('id', 'DESC')
                                ->get();

                            /*Get Products Node Id's*/
                            if (count($company_products) > 0) {
                                foreach ($company_products as $nmeta) {
                                    $nodeIds[] = $nmeta->getKey();
                                }
                            } else {

                                $nodeIds[] = null;
                            }
                        } else {

                            $nodeIds[] = null;
                        }
                    } else {

                        /*If NodeMeta Key == Category*/
                        $nodeIds[] = $meta->node_id;

                    }
                }
            } else {

                $nodeIds[] = null;

            }
        }



        return $nodeIds;
    }

    /**
     * @param $typeName
     * @return mixed
     * Get Node Type DataRow by Node Name form NodeType model
     */

    /* Featured Business */

    protected function getNodeTypeByName($typeName)
    {

        $type = NodeType::where('name', $typeName)->first();
        if ($type) return $type;

        die("ERROR! IN NODE_TYPE");
    }

    protected function getCreateSourceForm($nodeType)
    {

        $form = $this->form(
            source_form_name($nodeType->getName(), true), ['method' => 'POST']);

        // $form->compose('ReactorCMS\Html\Forms\Nodes\EditSEOForm');
        $form->modify('locale', 'hidden', ['value' => locale()]);
        $form->modify('type', 'hidden', ['value' => $nodeType->getKey()]);

        return $form;
    }

    protected function getEditSourceForm($id, Node $node, NodeSource $source)
    {
        $form = $this->form(
            source_form_name($node->getNodeTypeName(), true), [
            'method' => 'PUT',
            //'url'   => route('reactor.nodes.update', [$id, $source->getKey()]),
            'model' => $source->toArray()
        ]);

        $form->compose('ReactorCMS\Html\Forms\Nodes\EditSEOForm');

        $form->exclude(['meta_title', 'meta_keywords', 'meta_description',
            'meta_image', 'meta_author']);

        return $form;
    }

    protected function check_business_exist()
    {
        $user = Auth::guard('web')->user();

        $node = $user->nodes()->withType('businesstype')->first();


        if (!$node) {

            return redirect()->route('business.create')->send();


        };

        return $node;
    }

    
    
}