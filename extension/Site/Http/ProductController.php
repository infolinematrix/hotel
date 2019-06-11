<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:10 PM
 */

namespace extension\Site\Http;

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

class ProductController extends PublicController
{

    use UsesNodeHelpers, UsesNodeForms, UsesTranslations;
    use UseAppHelper;

    public function index($node_id){

        $products = Node::withType('producttype')->where('parent_id', $node_id)->get();

        $data = [];

        $path = 'https://dummyimage.com/300x200/f0f0f0/fff.png&text=Profile';
        foreach ($products as $node){

            $img = $node->getImages()->first();
            if($img){

                $path = asset('uploads/' . $img->path);
            }

            $data[] = [
            'id' => $node->getKey(),
            'source_id' => $node->translate(locale())->getKey(),
            'title' => $node->getTitle(),
            'slug' => $node->getName(),
            'description' => $node->product_description,
            'image' => $path
           ];
        }

        return $data;


    }

    public function postProduct(Request $request, $node_id)
    {



        $nodeType = get_node_type('producttype');
        $type = $nodeType->getKey();

        $title = $request->input('title');
        $node_name = str_slug($title);

        $check = Node::withType('producttype')->withName($node_name)->first();

        if ($check != null) {
            return 'exist';
        } else {

            $request->request->set('title', $title);
            $request->request->set('node_name', $node_name);
            $request->request->set('locale', 'en');
            $request->request->set('type', $type);

            $this->validateCreateForm($request);

            list($node, $locale) = $this->createNode($request, $node_id);

            $data = [
                'node_id' => $node->getKey(),
                'source_id' => $node->translate($locale)->getKey(),
            ];

            $image = $request->file('image');
            if ($image) {

                $name = str_random(6);
                $ext = $image->extension();


                $destinationPath = public_path('/uploads');

                $image->move($destinationPath, $name . '.' . $ext);
                ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->resize(600, 400)->save();

                $cover = $node->getImages()->first();

                if ($cover) {
                    File::delete(upload_path($cover->path));
                    Media::where('node_id', $node->getKey())->delete();
                }

                //-- Save Image in Database--//
                $media = new Media();
                $media->node_id = $node->getKey();
                $media->path = $name . '.' . $ext;
                $media->name = $name;
                $media->extension = $ext;
                $media->mimetype = $image->getClientMimeType();
                $media->size = 0;
                $media->user_id = Auth::user()->id;
                $media->save();
            }

            return $data;
        }
    }

    public function editProduct($id, $source_id = null)
    {

        $source = NodeSource::find($source_id);
        $product = Node::withType('producttype')->find($id);

        $user = Auth::user();
        if ($product || $source) {

            $source = Node::withType('producttype')->find($source->node_id);
            if ($user->id == $product->user_id && $user->id == $source->user_id) {
                $data['node'] = $product;

                $image = $product->getImages()->first();

                $data['image'] = 'https://dummyimage.com/300x200/f0f0f0/fff.png&text=Profile';

                if ($image) {
                    $data['image'] = asset('uploads/' . $image->path);
                }
                $data['product'] = 'EXIST';
            } else {
                $data['product'] = 'NOT EXIST';
            }
        } else {
            $data['product'] = 'NOT EXIST';
        }

        return $data;

    }

    public function updateProduct(Request $request, $id, $source)
    {


        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        //--Update Node
        $node->update([
            $locale => array_except($request->all(), ['_token', '_method']),
        ]);

        $data = [
            'node_id' => $node->getKey(),
            'source_id' => $node->translate($locale)->getKey(),
        ];

        $image = $request->file('image');
        if ($image) {

            $name = str_random(6);
            $ext = $image->extension();


            $destinationPath = public_path('/uploads');

            $image->move($destinationPath, $name . '.' . $ext);
            ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->resize(600, 400)->save();

            $img = $node->getImages()->first();

            if ($img) {
                File::delete(upload_path($img->path));
                Media::where('node_id', $node->getKey())->delete();
            }

            //-- Save Image in Database--//
            $media = new Media();
            $media->node_id = $node->getKey();
            $media->path = $name . '.' . $ext;
            $media->name = $name;
            $media->extension = $ext;
            $media->mimetype = $image->getClientMimeType();
            $media->size = 0;
            $media->user_id = Auth::user()->id;
            $media->save();
        }


        return $data;
    }


}
