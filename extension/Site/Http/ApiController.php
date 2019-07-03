<?php

namespace Extension\Site\Http;

use Illuminate\Http\Request;
use ReactorCMS\Entities\Contacts;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use ReactorCMS\Entities\Settings;
use Mail;
use Illuminate\Support\Facades\Config;
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
                'slug' => $node->getName(),
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

    public function getBlogs(){
        $data = [];
        $nodes = Node::withType('blog')->published()->translatedIn(locale())->get();
        foreach ($nodes as $node){

            $img = $node->getImages()->first();
            $data[] = [

                'id' => $node->getKey(),
                'title' => $node->getTitle(),
                'slug' => $node->getName(),
                'image' => asset('uploads/'.$img->path),
                'description' => strip_tags(str_limit($node->content,100)),
            ];

        }

        return $data;

    }

    public function getPackages(){

        $data = [];

        $nodes = Node::withType('travelpackage')->published()->translatedIn(locale())->get();

        foreach ($nodes as $node){

            $discount_price = $node->price - ($node->price * (10/100));

            setlocale(LC_MONETARY, 'en_IN');
            $discount_price = money_format('%!i', $discount_price);
            $price = money_format('%!i', $node->price);

            $img = $node->getImages()->first();
            $data[] = [

                'id' => $node->getKey(),
                'title' => $node->getTitle(),
                'image' => asset('uploads/'.$img->path),
                'price' => $discount_price,
                'original_price' => $price,
                'place_cover' => $node->place_cover,
                'description' => strip_tags(str_limit($node->description,100)),
            ];

        }

        return $data;
    }

    public function getBlog(NodeRepository $nodeRepository, $name){
        $node = $nodeRepository->getNodeAndSetLocale($name, true, false);

       $img = $node->getImages()->first();


        $data['node'] = [
            'id' => $node->getKey(),
            'title' => $node->getTitle(),
            'description' => $node->content,
            'image' => asset('uploads/'.$img->path)
        ];

        return $data;

    }

    public function contact(Request $request){

        $data = [

            'first_name' => $request->firstname,
            'last_name' =>  $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->message
        ];

        Contacts::insert($data);


        $data = [
            'name' => $request->firstname.' '.$request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->message

        ];

        /*Get Mail Configuration*/

        Config::set('mail', getMailconfig());

        Mail::send('mail.contact', $data, function ($message) use ($data) {
            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Contact Us - '.getSettings('site_title'));
            $message->to(getSettings('email_from_email'));
        });
        
        return 'Send';

    }
}
