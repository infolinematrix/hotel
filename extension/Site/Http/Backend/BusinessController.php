<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2/5/18
 * Time: 2:01 PM
 */

namespace extension\Site\Http\Backend;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\ReactorController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Hierarchy\Tags\Tag;
use Reactor\Documents\Media\Media;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\Auth;
class BusinessController extends ReactorController
{
    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    public function __construct()
    {

    }

    public function index()
    {

        $nodes = Node::withType('business')->sortable()
            ->translatedIn(locale())
            ->paginate(20);

        return view('Site::backend.business.index', compact('nodes'));

    }

    public function create()
    {

        $type = get_node_type('business');

        $form = $this->getCreateForm(null, null);
        $form->setUrl(route('reactor.business.create'));

        $form->modify('type', 'hidden', [
            'value' => $type->getKey(),

        ]);

        $categories = Node::withType('categories')->where('parent_id', null)->get();

        return view('Site::backend.business.create', compact('form', 'categories'));

    }

    public function store(Request $request)
    {

        $this->validateCreateForm($request);

        $categories = $request->category;
        $cat = '';
        foreach ($categories as $key => $value) {

            $cat .= $value . ',';
        }
        $category = rtrim($cat, ',');

        list($node, $locale) = $this->createNode($request, null);

        //save meta
        $node->setmeta('categories', $category);
        $node->save();

        $this->notify('nodes.created');

        return redirect()->route('reactor.business.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey(),
        ]);

    }

    public function edit($id, $source)
    {

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);
        $form->setUrl(route('reactor.business.edit', [$id, $source->getKey()]));

        $form->modify('meta_image', 'hidden', [
        ]);

        $form->modify('meta_author', 'hidden', [
        ]);

        $locations = Node::withType('locations')->where('parent_id', null)->get();
        $location_meta = $node->metas()->where('key', 'locations')->first();

        if ($location_meta) {
            $metas = explode(',', $location_meta->value);
            $loc = '';
            foreach ($metas as $key => $value) {

                $loca = Node::findOrFail($value);
                if ($loca->parent_id == null) {

                    $loc .= $loca->getKey();
                }

            }
            $location_meta = $loc;
        }

        return view('Site::backend.business.edit', compact('form', 'node', 'locale', 'source', 'locations', 'location_meta'));
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

        $request->request->set('payment_accept',json_encode($request->payment));
        $node->update([
            $locale => $request->all(),
        ]);

        $locations = $request->input('locations');

        $loc = '';
        foreach ($locations as $key => $value) {

            $loc .= $value . ',';
        }
        $location = rtrim($loc, ',');

        //save meta
        $node->setmeta('locations', $location);
        $node->save();

        $this->notify('nodes.edited', 'updated_node_content', $node);

        return redirect()->back();
    }

    public function getPhoto($node_id){

        $node = Node::find($node_id);

        $logo = $node->getImages()->where('img_type','profile')->first();
        $cover = $node->getImages()->where('img_type','cover')->first();

        return view('Site::backend.business.photo', compact('node','logo','cover'));

    }

    public function updatePhoto(Request $request){

        $logo = $request->file('logo');
        $node = Node::find($request->node_id);

        if($logo) {
            $name = str_random(6);
            $ext = $logo->extension();

            $destinationPath = public_path('/uploads');
            $logo->move($destinationPath, $name . '.' . $ext);
            ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->resize(300, 200)->save();

            $profile = $node->getImages()->where('img_type', 'profile')->first();

            if ($profile) {
                File::delete(upload_path($profile->path));
                Media::where('node_id', $node->getKey())->where('img_type', 'profile')->delete();
            }
            //-- Save Image in Database--//
            $media = new Media();
            $media->node_id = $node->getKey();
            $media->path = $name . '.' . $ext;
            $media->name = $name;
            $media->extension = $ext;
            $media->mimetype = $logo->getClientMimeType();
            $media->img_type = 'profile';
            $media->size = 0;
            $media->user_id = Auth::user()->id;
            $media->save();
        }

        $coverimage = $request->file('cover');
        if ($coverimage) {

            $name = str_random(6);
            $ext = $coverimage->extension();

            $destinationPath = public_path('/uploads');

            $coverimage->move($destinationPath, $name . '.' . $ext);
            ImageFacade::make(sprintf('uploads/%s', $name . '.' . $ext))->save();

            $cover = $node->getImages()->where('img_type', 'cover')->first();

            if ($cover) {
                File::delete(upload_path($cover->path));
                Media::where('node_id', $node->getKey())->where('img_type', 'cover')->delete();
            }

            //-- Save Image in Database--//
            $media = new Media();
            $media->node_id = $node->getKey();
            $media->path = $name . '.' . $ext;
            $media->name = $name;
            $media->extension = $ext;
            $media->mimetype = $coverimage->getClientMimeType();
            $media->img_type = 'cover';
            $media->size = 0;
            $media->user_id = Auth::user()->id;
            $media->save();
        }

        return redirect()->back()->with('message', "Updated Successfully");

    }
    public function import()
    {
        $categories = Node::withType('categories')->where('parent_id', null)->get();
        $locations = Node::withType('locations')->where('parent_id', null)->get();

        return view('Site::backend.business.import', compact('locations', 'categories'));
    }

    public function import_store($id = null, Request $request)
    {

        $file = trim($request->file('file'));

        Excel::load($file, function ($reader) use ($request, $id) {
            $results = $reader->get();

            if (count($results) > 500) {

                return redirect()->back()->with('message', 'Not allowed more than 500 data');
            }

            $isValid = false;

            $isFailed = [];
            
            foreach ($results as $row1) {



                if (trim($row1['business_title']) != null && trim($row1['slug']) != null && trim($row1['description']) != null
                    && trim($row1['address']) != null && trim($row1['email']) != null && trim($row1['phone']) != null) {
                        
                        $isValid = $this->check_business($request, $id, $row1);

                } else {

                    $isFailed[] = $row1;
                }
            }

            if ($isValid == true) {

                $msz = "Imported Successfully, " . count($isFailed) . " Rejected";
                return redirect()->back()->with('message', $msz);
            } else {

                if (count($isFailed) > 0) {
                    $msz = count($isFailed) . " Rejected";
                } else {

                    $msz = "Already Exist!";

                }
                return redirect()->back()->with('message', $msz);
            }

        });

        return redirect()->back();

    }

    private function check_business($request, $parent = 0, $str)
    {
        
        $categories = $request->category;
        $locations = $request->locations;

        $nodeType = get_node_type('business');
        $type = $nodeType->getKey();
        
        if ($str != '') {

            $request->request->set('title', trim($str['business_title']));
            $request->request->set('node_name', trim(str_slug($str['business_title'])));
            $request->request->set('locale', 'en');
            $request->request->set('type', $type);
            $request->request->set('business_description', trim($str['description']));
            $request->request->set('business_address', trim($str['address']));
            $request->request->set('business_email', trim($str['email']));
            $request->request->set('business_website', trim($str['website']));
            $request->request->set('business_phone', trim($str['phone']));
            $request->request->set('business_facebook', trim($str['facebook']));
            $request->request->set('business_twitter', trim($str['twitter']));
            $request->request->set('business_linkedin', trim($str['linkedin']));
            $request->request->set('business_youtube', trim($str['youtube']));
            $request->request->set('business_google', trim($str['google']));
            $request->request->set('business_employee', trim($str['no_of_employee']));
            $request->request->set('business_scale', trim($str['scale']));
            $request->request->set('business_long', trim($str['long']));
            $request->request->set('business_lat', trim($str['lat']));
            $request->request->set('business_entity', trim($str['entity']));
            $request->request->set('business_established', trim($str['established_year_month']));

            $chk_location = Node::withName(trim($str['slug']))->first();

            if (!$chk_location) {

                $this->validateCreateForm($request);

                list($node, $locale) = $this->createNode($request, $parent);

                /*save meta*/
                /*category*/
                $cat = '';
                foreach ($categories as $key => $value) {

                    $cat .= $value . ',';
                }
                $category = rtrim($cat, ',');
                $node->setmeta('categories', $category);
                $node->save();

                /*locations*/
                $loc = '';
                foreach ($locations as $key => $value) {

                    $loc .= $value . ',';
                }
                $location = rtrim($loc, ',');

                //save meta
                $node->setmeta('locations', $location);
                $node->save();

                /*save Keywords*/

                if ($str['keywords'] != null) {
                    $keywords = explode(",", $str['keywords']);
                    foreach ($keywords as $keyword) {

                        $tag = Tag::firstByTitleOrCreate(trim($keyword));
                        $node->attachTag($tag->getKey());
                    }
                }

                return true;

            } else {

                $node_id = $chk_location->getKey();
                $source = $chk_location->translate('en')->getKey();
                list($node, $locale, $source) = $this->authorizeAndFindNode($node_id, $source);

                //--Update Node
                $node->update([
                    $locale => array_except($request->all(), ['_token', '_method']),
                ]);

                return true;
            }
        }
    }

    
}
