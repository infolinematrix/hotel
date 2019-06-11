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
class RoomtypeController extends ReactorController
{
    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    public function __construct()
    {

    }

    public function index()
    {

        $nodes = Node::withType('roomtype')->sortable()
            ->translatedIn(locale())
            ->paginate(20);
        return view('Site::backend.roomtype.index', compact('nodes'));

    }

    public function create()
    {

        $type = get_node_type('roomtype');

        $form = $this->getCreateForm(null, null);
        $form->setUrl(route('reactor.roomtype.create'));

        $form->modify('type', 'hidden', [
            'value' => $type->getKey(),

        ]);

        return view('Site::backend.roomtype.create', compact('form'));

    }

    public function store(Request $request)
    {

        $this->validateCreateForm($request);


        list($node, $locale) = $this->createNode($request, null);

        $this->notify('nodes.created');

        return redirect()->route('reactor.roomtype.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey(),
        ]);

    }

    public function edit($id, $source)
    {

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);
        $form->setUrl(route('reactor.roomtype.edit', [$id, $source->getKey()]));

        $form->modify('meta_image', 'hidden', [
        ]);

        $form->modify('meta_author', 'hidden', [
        ]);

        $form->modify('price','number',[

            'rules' => 'required'
        ]);

        $form->modify('discount','number',[

            'rules' => 'required'
        ]);

        $form->modify('no_of_rooms','number',[
            'rules' => 'required',
        ]);
        return view('Site::backend.roomtype.edit', compact('form', 'node', 'locale', 'source'));
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

        $this->notify('nodes.edited', 'updated_node_content', $node);

        return redirect()->back();
    }

    public function getPhoto($node_id){

        $node = Node::find($node_id);

        $images = $node->getImages()->get();



        return view('Site::backend.roomtype.photo', compact('node','images'));

    }

    public function updatePhoto(Request $request){

        $photos = $request->file('images');
        $node = Node::find($request->node_id);

        /*Upload Images*/
        if($photos) {
            for ($i = 0; $i < count($photos); $i++) {
                $name = str_random(6);
                $ext = $photos[$i]->extension();

                $destinationPath = public_path('/uploads');
                $photos[$i]->move($destinationPath, $name . '.' . $ext);
                ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->resize(600, 400)->save();

                //-- Save Image in Database--//
                $media = new Media();
                $media->node_id = $node->getKey();
                $media->path = $name . '.' . $ext;
                $media->name = $name;
                $media->extension = $ext;
                $media->mimetype = $photos[$i]->getClientMimeType();
                $media->size = 0;
                $media->user_id = Auth::user()->id;
                $media->save();
            }
        }

        /*Update Images*/
        $images = $request->file('imagess');
        $img_id = $request->input('picID');
        if($images){

            for ($i = 0; $i < count($images); $i++) {
                $name = str_random(6);
                $ext = $images[$i]->extension();

                $destinationPath = public_path('/uploads');
                $images[$i]->move($destinationPath, $name . '.' . $ext);
                ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->resize(600, 400)->save();

                $img = $node->getImages()->where('id',$img_id[$i])->first();

                 if ($img) {
                     File::delete(upload_path($img->path));
                     Media::where('id', $img->id)->delete();
                 }
                //-- Save Image in Database--//
                $media = new Media();
                $media->node_id = $node->getKey();
                $media->path = $name . '.' . $ext;
                $media->name = $name;
                $media->extension = $ext;
                $media->mimetype = $images[$i]->getClientMimeType();
                $media->img_type = 'profile';
                $media->size = 0;
                $media->user_id = Auth::user()->id;
                $media->save();
            }
        }


        return redirect()->back()->with('message', "Updated Successfully");

    }

    public function photoDelete($id){

        $media = Media::where('id',$id)->first();

        File::delete(upload_path($media->path));

        Media::where('id',$id)->delete();

        return redirect()->back()->with('message','Deleted');

    }
}
