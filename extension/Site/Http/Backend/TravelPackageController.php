<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2/5/18
 * Time: 2:01 PM
 */

namespace extension\Site\Http\Backend;

use Illuminate\Http\Request;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\ReactorController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Documents\Media\Media;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\Auth;
class TravelPackageController extends ReactorController
{
    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    public function __construct()
    {

    }

    public function index()
    {

        $nodes = Node::withType('travelpackage')->sortable()
            ->translatedIn(locale())
            ->paginate(20);
        return view('Site::backend.travelpackage.index', compact('nodes'));

    }

    public function create()
    {

        $type = get_node_type('travelpackage');

        $form = $this->getCreateForm(null, null);
        $form->setUrl(route('reactor.travelpackage.create'));

        $form->modify('type', 'hidden', [
            'value' => $type->getKey(),

        ]);

        return view('Site::backend.travelpackage.create', compact('form'));

    }

    public function store(Request $request)
    {

        $this->validateCreateForm($request);


        list($node, $locale) = $this->createNode($request, null);

        $this->notify('nodes.created');

        return redirect()->route('reactor.travelpackage.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey(),
        ]);

    }

    public function edit($id, $source)
    {

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);
        $form->setUrl(route('reactor.travelpackage.edit', [$id, $source->getKey()]));
        $form->setFormOptions(['files' => true]);

        $form->modify('meta_image', 'hidden', [
        ]);

        $form->modify('meta_author', 'hidden', [
        ]);
        $image = $node->getImages()->first();


        return view('Site::backend.travelpackage.edit', compact('form', 'node','image','locale', 'source'));
    }

    public function update(Request $request, $id, $source)
    {


        $node = $this->authorizeAndFindNode($id, $source, 'EDIT_NODES', false);

        if ($response = $this->validateNodeIsNotLocked($node)) {
            return $response;
        }

        list($locale, $source) = $this->determineLocaleAndSource($source, $node);

        $this->validateEditForm($request, $node, $source);

        $this->determinePublish($request, $node);

        $request->request->set('facilities',json_encode($request->facilities));
        $node->update([
            $locale => $request->all(),
        ]);


        $photo = $request->file('image');
        /*Upload Image*/
        if($photo) {

                $name = str_random(6);
                $ext = $photo->extension();

                $destinationPath = public_path('/uploads');
                $photo->move($destinationPath, $name . '.' . $ext);
                ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->resize(600, 400)->save();

                //-- Save Image in Database--//
                $media = new Media();
                $media->node_id = $node->getKey();
                $media->path = $name . '.' . $ext;
                $media->name = $name;
                $media->extension = $ext;
                $media->mimetype = $photo->getClientMimeType();
                $media->size = 0;
                $media->user_id = Auth::user()->id;
                $media->save();

        }


        $this->notify('nodes.edited', 'updated_node_content', $node);

        return redirect()->back();
    }


}
