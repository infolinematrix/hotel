<?php


namespace Extension\Site\Http;


use ReactorCMS\Entities\Subscriber;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facade as Breadcrumbs;
use ReactorCMS\Entities\Testimonial;
use ReactorCMS\Entities\Contacts;


class SiteController extends PublicController
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;


    /**
     * Shows the homepage
     *
     * @param NodeRepository $nodeRepository
     * @return View
     */

    public function getHome()
    {

        return $this->compileView('Site::index', compact(null), 'SITE HOME');
    }


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

        //Breadcrumbs----//
        Breadcrumbs::register('page', function ($breadcrumbs, $node) {
            $breadcrumbs->push($node->getTitle());
        });


        return $this->compileView('Site::page', compact('node'), $node->getMetaTitle());
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

    /**
     * Shows the tag page
     *
     * @param string $tags
     * @param string $name
     * @return View
     */
    public function getTag($tags, $name)
    {
        set_app_locale_with('tags', $tags);
        $tag = Tag::withName($name)->firstOrFail();

        return view('tag', compact('tag'));
    }

    /**
     * Contact Us Page
     */

    public function sitemap()
    {

        // create new sitemap object
        $sitemap = App::make('sitemap');


        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);

        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached()) {
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
            //$sitemap->add(URL::to('page'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

            // add item with translations (url, date, priority, freq, images, title, translations)
            $translations = [
                ['language' => 'fr', 'url' => URL::to('pageFr')],
                ['language' => 'de', 'url' => URL::to('pageDe')],
                ['language' => 'bg', 'url' => URL::to('pageBg')],
            ];
            //$sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);

            // add item with images
            $images = [
                ['url' => URL::to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
                ['url' => URL::to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
                ['url' => URL::to('images/pic3.jpg'), 'title' => 'Image title3'],
            ];
            //$sitemap->add(URL::to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);

            // get all posts from db
            //$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

            $nodeTypes = ['product', 'basicpage'];

            foreach ($nodeTypes as $key => $value) {

                $posts = Node::withType($value)->Sortable()->translatedIn(locale())->get();

                // add every post to the sitemap
                if ($value == 'blog') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('site.blog', $post->getName()), $post->updated_at, $post->priority, 'monthly');
                    }
                }
                if ($value == 'product') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('product.single', [product_category_last($post), $post->getName()]), $post->updated_at, $post->priority, 'weekly');
                    }
                }
                if ($value == 'services') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('site.services', $post->getName()), $post->updated_at, $post->priority, 'monthly');
                    }
                }
                if ($value == 'basicpage') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('site.page', $post->getName()), $post->updated_at, $post->priority, 'monthly');
                    }
                }


            }

            // add every post to the sitemap
            /*foreach ($posts as $post) {
                $sitemap->add($post->slug, $post->modified, $post->priority, $post->freq);
            }*/
        }


        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        //$sitemap->store('xml', 'sitemap');
        return $sitemap->render('xml');
    }

    public function feed()
    {

        // create new sitemap object
        $sitemap = App::make('sitemap');


        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);

        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached()) {
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
            //$sitemap->add(URL::to('page'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

            // add item with translations (url, date, priority, freq, images, title, translations)
            $translations = [
                ['language' => 'fr', 'url' => URL::to('pageFr')],
                ['language' => 'de', 'url' => URL::to('pageDe')],
                ['language' => 'bg', 'url' => URL::to('pageBg')],
            ];
            //$sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);

            // add item with images
            $images = [
                ['url' => URL::to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
                ['url' => URL::to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
                ['url' => URL::to('images/pic3.jpg'), 'title' => 'Image title3'],
            ];
            //$sitemap->add(URL::to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);

            // get all posts from db
            //$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

            $nodeTypes = ['product', 'basicpage'];

            foreach ($nodeTypes as $key => $value) {

                $posts = Node::withType($value)->Sortable()->translatedIn(locale())->take(100)->get();

                // add every post to the sitemap
                if ($value == 'blog') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('site.blog', $post->getName()), $post->updated_at, $post->priority, 'monthly');
                    }
                }
                if ($value == 'product') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('product.single', [product_category_last($post), $post->getName()]), $post->updated_at, $post->priority, 'weekly');
                    }
                }
                if ($value == 'services') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('site.services', $post->getName()), $post->updated_at, $post->priority, 'monthly');
                    }
                }
                if ($value == 'basicpage') {
                    foreach ($posts as $post) {
                        $sitemap->add(route('site.page', $post->getName()), $post->updated_at, $post->priority, 'monthly');
                    }
                }


            }

            // add every post to the sitemap
            /*foreach ($posts as $post) {
                $sitemap->add($post->slug, $post->modified, $post->priority, $post->freq);
            }*/
        }


        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        //$sitemap->store('xml', 'sitemap');
        return $sitemap->render('ror-rss');
    }


    public function convert_meta()
    {

        $node_meta1 = \DB::table('node_meta1')->groupBy('node_id')->get();

        foreach ($node_meta1 as $meta1) {
            $metas = \DB::table('node_meta1')->where('node_id', $meta1->node_id)->get();

            if (count($metas) > 1) {
                $arr = [];
                foreach ($metas as $key) {
                    array_push($arr, $key->value);
                }
                $arr = implode(",",$arr);

                $data = [
                    'node_id' => $meta1->node_id,
                    'node_type' => 'Reactor\Hierarchy\Node',
                    'type' => 'array',
                    'key' => 'category',
                    'value' => $arr
                ];

                $meta = \DB::table('meta')->insert($data);

                echo $meta1->node_id.'</br>';


            }
        }
        die("FINISH.....");
    }
}
