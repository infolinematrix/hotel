<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:10 PM
 */

namespace extension\Site\Http;



use Nuclear\Hierarchy\NodeType;
use Reactor\Entities\Node;
use Reactor\Entities\NodeMeta;
use Reactor\Http\Controllers\PublicController;
use Reactor\Http\Controllers\Traits\UsesNodeForms;
use Reactor\Http\Controllers\Traits\UsesNodeHelpers;
use Nuclear\Hierarchy\NodeRepository;
use DaveJamesMiller\Breadcrumbs\Facade as Breadcrumbs ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Mail;

class SearchController extends PublicController
{

    use UsesNodeHelpers, UsesNodeForms;


    public function index(Request $request)
    {



        if($request->search == null) return redirect()->to('/');

           \Session::forget(['products']);

           $search = trim($request->search);
return redirect()->route("site.search.products", str_slug($search));


    }

    public function productResult($search)
    {
        $products = Node::withType('product')->withTitle("%$search%");
        \Session::put('products', $search);
        $nodes = $products->paginate(20);

        return $this->compileView('Site::product-list', compact('home','nodes'), 'Search for products');
    }

}