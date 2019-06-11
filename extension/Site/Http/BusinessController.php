<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:10 PM
 */

namespace extension\Site\Http;

use Extension\Site\Entities\Appointment;
use Extension\Site\Entities\Contact;
use extension\Site\Helpers\UseAppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image as ImageFacade;
use Mail;
use ReactorCMS\Entities\Contacts;
use ReactorCMS\Entities\Promotion;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Documents\Media\Media;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\NodeSource;
use Reactor\Hierarchy\Tags\Tag;

class BusinessController extends PublicController
{

    use UsesNodeHelpers, UsesNodeForms, UsesTranslations;
    use UseAppHelper;

    public function getProfile(NodeRepository $nodeRepository, $name)
    {
        # code...
        $node = $nodeRepository->getNodeAndSetLocale($name, true, false);

        # image
        $img = $node->getImages()->where('img_type', 'profile')->first();

        $path = 'https://dummyimage.com/300x200/f0f0f0/fff.png&text=Profile';
        if ($img) {
            $path = asset('uploads/' . $img->path);
        }

        #Cover Image
        $coverimage = $node->getImages()->where('img_type', 'cover')->first();
        $coverimg = '/cover.jpg';
        if ($coverimage) {
            $coverimg = asset('uploads/' . $coverimage->path);
        }

        #keywords
        $keywords = null;
        $tags = $node->tags()->get();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                $keywords[] = [
                    'title' => $tag->title,
                    'slug' => $tag->tag_name,
                ];
            }
        }

        #working hourss
        $modelName = source_model_name('workinghours', true);
        $hours = $modelName::where('id', $node->translate(locale())->getKey())
            ->where('node_id', $node->getKey())->first();

        $data['id'] = $node->getKey();
        $data['title'] = $node->getTitle();
        $data['address'] = $node->business_address;
        $data['location'] = getBusinessLocation($node->getKey());
        $data['tags'] = $keywords;
        $data['zipcode'] = $node->business_zipcode;
        $data['phone'] = $node->business_phone;
        $data['email'] = $node->business_email;
        $data['website'] = $node->business_website;
        $data['logo'] = $path;
        $data['review_rate'] = $node->getRating();
        $data['review_count'] = $node->getReviews()->count();
        $data['working_hours'] = ($hours ? json_decode($hours->hours) : null);
        $data['coverimage'] = $coverimg;
        $data['about'] = $node->business_description;
        $data['business_employee'] = $node->business_employee;
        $data['business_scale'] = Lang::get('application.scale.'.$node->business_scale);
        $data['business_entity'] = Lang::get('application.entity.'.$node->business_entity);
        $data['business_established'] = $node->business_established;

        return $data;
    }

    public function postContact(Request $request, $node_id)
    {

        $pdata = [

            'node_id' => $node_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->contact_no,
            'content' => $request->message,
        ];

        Contact::insert($pdata);

        $data = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->contact_no,
            'content' => $request->message,
            'site_name' => getSettings('site_title'),
            'business_email' => Node::find($node_id),
        ];

        /*Get Mail Configuration*/
        Config::set('mail', getMailconfig());

        Mail::send('Site::email.contact', $data, function ($message) use ($data) {
            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Contact us');
            $message->to($data['business_email']->business_email);
        });

        return "SUCCESS";

    }

    public function postAppointment(Request $request, $node_id)
    {

        $pdata = [

            'node_id' => $node_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact_no,
            'message' => $request->message,
            'picker_date' => $request->date,
            'picker_time' => $request->time,
        ];

        Appointment::insert($pdata);

        $data = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->contact_no,
            'content' => $request->message,
            'site_name' => getSettings('site_title'),
            'business_email' => Node::find($node_id),
            'picker_date' => $request->date,
            'picker_time' => $request->time,
        ];

        /*Get Mail Configuration*/
        Config::set('mail', getMailconfig());

        Mail::send('Site::email.appointment', $data, function ($message) use ($data) {
            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Contact us');
            $message->to($data['business_email']->business_email);
        });

        return "SUCCESS";

    }
    public function addBusiness()
    {

        $user = Auth::user();
        $node = Node::withType('business')->where('user_id', $user->id)->first();

        if ($node) {

            $coverimage = $node->getImages()->where('img_type', 'cover')->first();

            $profileimage = $node->getImages()->where('img_type', 'profile')->first();

            $coverimg = '/cover.jpg';

            if ($coverimage) {
                $coverimg = asset('uploads/' . $coverimage->path);
            }

            $profileimg = '/avatar_male.png';

            if ($profileimage) {

                $profileimg = asset('uploads/' . $profileimage->path);
            }
            $data['node'] = [
                'title' => $node->getTitle(),
                'description' => $node->business_description,
                'email' => $node->business_email,
                'node_id' => $node->getKey(),
                'source_id' => $node->translate(locale())->getKey(),
                'coverimage' => $coverimg,
                'profileimage' => $profileimg,
            ];

        } else {

            $data['node'] = null;
        }

        return $data;
    }
    public function postBusiness(Request $request)
    {

        $nodeType = get_node_type('business');
        $type = $nodeType->getKey();

        $title = $request->input('title');
        $node_name = str_slug($title);

        $categories = $request->category;
        $cat = '';
        foreach ($categories as $key => $value) {

            $cat .= $value . ',';
        }
        $category = rtrim($cat, ',');

        $check = Node::withType('business')->withName($node_name)->first();

        if ($check != null) {
            return 'exist';
        } else {

            $request->request->set('title', $title);
            $request->request->set('node_name', $node_name);
            $request->request->set('locale', 'en');
            $request->request->set('type', $type);

            $this->validateCreateForm($request);

            list($node, $locale) = $this->createNode($request, null);

            //save meta
            $node->setmeta('categories', $category);
            $node->save();

            $data = [
                'node_id' => $node->getKey(),
                'source_id' => $node->translate($locale)->getKey(),
            ];

            return $data;
        }
    }

    public function editBusiness($id, $source_id = null)
    {

        $source = NodeSource::find($source_id);
        $business = Node::withType('business')->find($id);

        $user = Auth::user();
        if ($business || $source) {

            $source = Node::withType('business')->find($source->node_id);
            if ($user->id == $business->user_id && $user->id == $source->user_id) {
                $data['node'] = $business;

                $loc_meta = $business->metas()->where('key', 'locations')->first();
                if ($loc_meta) {
                    $data['locations'] = explode(',', $loc_meta->value);
                }
                /*keywoords*/
                $keyword = $data['node']->tags()->get();

                if (count($keyword) > 0) {
                    foreach ($keyword as $tag) {
                        $tg[] = $tag->title;

                    }

                    $data['keywords'] = $tg;

                } else {

                    $data['keywords'] = [];
                }

                $data['business'] = 'EXIST';
            } else {
                $data['business'] = 'NOT EXIST';
            }
        } else {
            $data['business'] = 'NOT EXIST';
        }

        /*Working Hours*/
        $modelName = source_model_name('workinghours', true);
        $hours = $modelName::where('id', $source_id)
            ->where('node_id', $id)->first();

        if ($hours) {

            $data['working_hours'] = json_decode($hours->hours);
        } else {

            $data['working_hours'] = null;
        }

        /*Payment Accept*/
        $payment_accept = $business->payment_accept;

        if($payment_accept){



            foreach(config('site.payment_accept') as $key => $value){

                $payment = json_decode($payment_accept, true);
                if($payment != null) {
                    $data['payment_accept'][] = (in_array($key, $payment));
                }else{

                    $data['payment_accept'][] = null;
                }
            }

        }else{

            $data['payment_accept'][] = null;

        }




        return $data;

    }

    public function updateBusiness(Request $request, $id, $source)
    {



        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        /*Payment Accept*/
        if($request->accept_payment){
        $request->request->set('payment_accept', json_encode($request->payment));
        }
        //--Update Node
        $node->update([
            $locale => array_except($request->all(), ['_token', '_method']),
        ]);

        //save meta Locations
        $locations = $request->location;
        if ($locations) {
            $loc = '';
            foreach ($locations as $key => $value) {

                if ($value != 'NaN') {
                    $loc .= $value . ',';
                }
            }

            $location = rtrim($loc, ',');

            $node->setmeta('locations', $location);
            $node->save();
        }

        //--Keywords
        $p_tags = $node->tags()->get();

        $keywords = $request->input('added_keywords');

        if ($keywords) {

            if (count($p_tags) > 0) {
                foreach ($p_tags as $pt) {
                    $node->detachTag($pt->id);
                }
            }

            $tags = explode(",", $keywords);

            foreach ($tags as $keyword) {
                $tag = Tag::firstByTitleOrCreate($keyword);
                $node->attachTag($tag->getKey());
            }
        }
        if ($request->input('set_tags')) {
            if (count($p_tags) > 0) {

                foreach ($p_tags as $pt) {
                    $node->detachTag($pt->id);
                }
            }
        }

        $data = [
            'node_id' => $node->getKey(),
            'source_id' => $node->translate($locale)->getKey(),
        ];

        return $data;
    }

    public function UpdateHours(Request $request, $node_id, $source)
    {

        $input = $request->all();
        $array = [];

        for ($i = 0; $i < 7; $i++) {
            if ($input['status'][$i] == 'false') {

                $ar[] = 'false';

            }
            $array[$i] = [
                'day' => $input['day'][$i],
                'status' => $input['status'][$i],
                'open' => $input['open'][$i],
                'close' => $input['close'][$i],
            ];
        }

        $json_data = json_encode($array);

        /*Insert or Update Working Hours*/
        $modelName = source_model_name('workinghours', true);
        $custom_table_class = new $modelName;
        $cModel = $modelName::where('id', $source)
            ->where('node_id', $node_id)->first();

        if (count($ar) == 7) {
            if ($cModel) {
                $modelName::where('id', $source)
                    ->where('node_id', $node_id)->delete();
            }
            return 'Updated Successfully';
        }
        if ($cModel) {
            $request->request->set('id', $source);
            $request->request->set('node_id', $node_id);
            $request->request->set('hours', $json_data);
            $data = array_except($request->all(), ['status', 'open', 'close', 'day']);
            $custom_table_class->where('id', $source)->update($data);

        } else {
            $request->request->set('id', $source);
            $request->request->set('node_id', $node_id);
            $request->request->set('hours', $json_data);
            $data = array_except($request->all(), ['status', 'open', 'close', 'day']);
            $custom_table_class->insert($data);

        }
        return 'Updated Successfully';

    }
    public function uploadImage(Request $request, $node_id)
    {

        $coverimage = $request->file('coverimage');
        $node = Node::find($node_id);

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

        $profileimage = $request->file('profileimage');

        if ($profileimage) {

            # code...
            $name = str_random(6);
            $ext = $profileimage->extension();

            $destinationPath = public_path('/uploads');
            $profileimage->move($destinationPath, $name . '.' . $ext);
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
            $media->mimetype = $profileimage->getClientMimeType();
            $media->img_type = 'profile';
            $media->size = 0;
            $media->user_id = Auth::user()->id;
            $media->save();
        }

        return "Updated";

    }
    public function getCategories()
    {

        $data = [];
        /**
         * Omited 'meta' from node "protected $with = ['translations','meta];"
         * You can use Node::with('meta')
         */
        $nodes = Node::withType('categories')->translatedIn(locale())->get();

        foreach ($nodes as $node) {

            $data[] = [
                'id' => $node->getKey(),
                'parent_id' => $node->parent_id,
                'source_id' => $node->translate(locale())->getKey(),
                'title' => $node->getTitle(),
                'slug' => $node->getName(),
                'popular' => $node->popular,
            ];
        }

        return $data;
    }

    public function getLocations()
    {

        $data = [];
        /**
         * Omited 'meta' from node "protected $with = ['translations','meta];"
         * You can use Node::with('meta')
         */
        $nodes = Node::withType('locations')->translatedIn(locale())->get();

        foreach ($nodes as $node) {

            $data[] = [
                'id' => $node->getKey(),
                'parent_id' => $node->parent_id,
                'source_id' => $node->translate(locale())->getKey(),
                'title' => $node->getTitle(),
                'slug' => $node->getName(),
                'popular' => $node->popular,

            ];

        }

        return $data;
    }

    public function getKeywords()
    {

        $tags = Tag::translatedIn(locale())->get();

        if (count($tags) > 0) {
            foreach ($tags as $tag) {

                $data[] = $tag->title;
            }
        } else {

            $data[] = null;
        }

        return $data;

    }

    public function hasBusiness(Request $request)
    {
        # code...
        $user = $request->user();

        $business = Node::withType('business')->where('user_id', $user->id)->first();

        return $business->getTitle();

    }

    public function searchLocation($term, NodeRepository $nodeRepository)
    {

        $nodes = $nodeRepository->searchNodes($term, 'locations');

        $data = [];

        foreach ($nodes as $node) {

            $data[] = [
                'value' => $node->getName(),
                'text' => $node->getTitle(),
            ];
        }

        return $data;
    }

    public function searchKeyword($term)
    {

        $id = Tag::search($term, 20, true)->get();

        if (count($id) != 0) {
            foreach ($id as $row) {
                $data[] = [
                    'value' => $row->tag_name,
                    'text' => $row->title,
                ];
            }
        } else {

            $data[] = null;
        }

        return $data;
    }

    public function postSearch(Request $request)
    {

        $keywords = $request->keyword;
        $location = $request->location;

        $data = [

            'keyword' => $keywords['value'],
            'location' => $location['value'],
        ];

        return $data;
    }

    public function search(Request $request, $params = null)
    {

        $params = explode('/', $params);

        if (count($params) == 1) {
            $loc = Node::withname($params[0])->first();
            if ($loc) {

            }
            $tags = Tag::withName($params[0])->first();
            $nodes = $tags->nodes()->get();

        }

        return $nodes;

    }

    public function browse($params = null)
    {

        $meta_data1 = '';
        $meta_data2 = '';

        $metas = explode('/', $params);

        if (count($metas) == 1) {
            $meta_data1 = Node::withName($metas[0])->first();

            if ($meta_data1) {
                $nodes = Node::withType('business')->findMetaValue($meta_data1->getKey());
            } else {

                $nodes = null;
            }
        }

        if (count($metas) == 2) {

            $meta_data1 = Node::withName($metas[0])->first();
            $meta_data2 = Node::withName($metas[1])->first();

            if ($meta_data1 == null || $meta_data2 == null) {

                $nodes = null;

            } else {
                $loc[] = $meta_data1->getKey();
                $cat[] = $meta_data2->getKey();

                $params = array_merge($loc, $cat);
                $nodes = Node::withType('business')->findMetaValue($params);
            }

        }

        if ($nodes != null) {
            $nodes = $nodes->Published()->whereHas('metas')->sortable('created_at', 'desc')->get();
        } else {
            $nodes = [];
        }
        $posts = [];
        if (count($nodes) > 0) {
            foreach ($nodes as $node) {

                /*Image*/
                $img = $node->getImages()->where('img_type', 'profile')->first();

                $path = 'https://dummyimage.com/300x200/f0f0f0/fff.png&text=Profile';
                if ($img) {

                    $path = asset('uploads/' . $img->path);
                }

                $posts[] = $this->getBusinessData($node);

            }
        }

        $data['business'] = $posts;
        if (count($nodes) > 0) {
            $data['meta_data'] = [

                'parameter' => $meta_data1->getTitle(),
                'type' => $meta_data1->getNodetype()->name,
                'category' => ($meta_data2 ? $meta_data2->getTitle() : ''),
            ];
        } else {

            $data['meta_data'] = [

                'parameter' => ($meta_data1 ? $meta_data1->getTitle() : $metas[0]),
                'type' => ($meta_data1 ? $meta_data1->getNodetype()->name : 'invalide'),
                'category' => (count($metas) == 2 ? ($meta_data2 ? $meta_data2->getTitle() : $metas[0]) : 'invalid'),
            ];
        }

        return $data;
    }

    private function getBusinessData($node)
    {
        # image...

        $img = $node->getImages()->where('img_type', 'profile')->first();
        $path = 'https://dummyimage.com/300x200/f0f0f0/fff.png&text=Profile';
        if ($img) {
            $path = asset('uploads/' . $img->path);
        }

        #Cover Image
        $coverimage = $node->getImages()->where('img_type', 'cover')->first();

        $coverimg = '/cover.jpg';
        if ($coverimage) {
            $coverimg = asset('uploads/' . $coverimage->path);
        }

        $tags = $node->tags()->get();

        $data = [

            'id' => $node->getKey(),
            'title' => $node->getTitle(),
            'slug' => $node->getName(),
            'address' => $node->business_address,
            'location' => getBusinessLocation($node->getKey()),
            'tags' => $tags,
            'zipcode' => $node->business_zipcode,
            'phone' => $node->business_phone,
            'email' => $node->business_email,
            'logo' => $path,
            'review_rate' => $node->getRating(),
            'review_count' => $node->getReviews()->count(),
            'coverimage' => $coverimg,
            'about' => strip_tags($node->business_description),
            'description' => strip_tags(str_limit($node->business_description,100)),

        ];




        return $data;

    }
    public function list_New($limit = 1)
    {
        # code...
        //$nodes = Node::recentlyCreated(10)->withType('business')->get();
        $nodes = Node::withType('business')->published()->recentlyCreated($limit)->get();

        $data = [];

        foreach ($nodes as $node) {

            $data[] = $this->getBusinessData($node);

            //dd($business);

        }

        return $data;

    }

    public function list_Visit($limit = 1)
    {
        # code...
        //$nodes = Node::recentlyCreated(10)->withType('business')->get();
        $nodes = Node::withType('business')->published()->recentlyVisited($limit)->get();

        $data = [];

        foreach ($nodes as $node) {

            $data[] = $this->getBusinessData($node);

            //dd($business);

        }

        return $data;
    }

    public function getSponsored($limit = 100)
    {
        # code...
        $data = [];

        $result = Promotion::where('max_clicks', '>=', \DB::raw('clicked'));
        $result->take($limit);
        $sponsored = $result->get();

        
        foreach ($sponsored as $row) {

            $node = Node::published()->find($row->node_id);

            if($node) {

                $data[] = $this->getBusinessData($node);
            }

        };
        return $data;
    }

    public function reviews(){

        $user = Auth::user();
        $node = Node::withType('business')->where('user_id', $user->id)->first();

        $reviews = $node->getReviews()->take(25)->get();

        $data= [];

        $revdata=[];

        foreach($reviews as $review){
            $revdata[] = [
                'type' => 'REV',
                'title' => $review->title,
                'description' => $review->body,

            ];
        }
        
        $contacts = Contact::where('node_id',$node->getKey())->take(25)->get();

        $condata = [];

        foreach ($contacts as $contact){

            $condata[] = [

                'type' => 'CON',
                'name' => $contact->first_name.' '.$contact->last_name,
                'description' => $contact->content
            ];
        }





        $data = array_merge($revdata,$condata);


       // dd($data);




        return $data;
    }


}
