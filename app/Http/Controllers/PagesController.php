<?php


namespace ReactorCMS\Http\Controllers;

use Illuminate\Support\Facades\App;
use Matrix\Categories\Http\Traits\UseCategory;
use Reactor\Hierarchy\Node;
use ReactorCMS\Http\Controllers\ReactorController;

use Illuminate\Http\Request;
use Reactor\Hierarchy\NodeSource;
use Reactor\Hierarchy\NodeType;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Illuminate\Support\Facades\File;


class PagesController extends ReactorController
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    public $nodeType = 'pages';

    public function __construct()
    {
        // constructor body
    }
    public function index()
    {


        $nodes = Node::withType($this->nodeType)->translatedIn(locale())->paginate(20);

        return $this->compileView('pages.index', compact('nodes'), 'Pages');
    }

    public function create()
    {
        # creating new Page
       
        $id = null; // there will be no chaild 
        $parent = !is_null($id) ? Node::findOrFail($id) : null;

        

        $type = get_node_type($this->nodeType);
        $form = $this->getCreateForm($id, $parent);
        $form->modify('type', 'hidden', [
            'value' => $type->getKey(),

        ]);
        $form->setUrl(route('reactor.pages.store'));

        
        
        return $this->compileView('pages.create', compact('form', 'parent'),
            ($parent) ? trans('nodes.add_child') : trans('nodes.create'));

    }


    public function store(Request $request, $id = null)
    {
        

        //$this->authorize('EDIT_NODES');

        $this->validateCreateForm($request);


        //dd($request->all());

        list($node, $locale) = $this->createNode($request, $id);

        $this->notify('Page Created');


        return redirect()->route('reactor.pages.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey()
        ]);

    }

    public function edit($id, $source = null)
    {


        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);
        
        $form->setUrl(route('reactor.pages.edit', [$id, $source->getKey()]));

        $form->modify('meta_image','hidden',[
        ]);

        $form->modify('meta_author','hidden',[
        ]);
        

        return $this->compileView('pages.edit', compact('form', 'node', 'locale', 'source'), 'Pages');
    }

    public function update(Request $request, $id, $source)
    {

        $node = $this->authorizeAndFindNode($id, $source, 'EDIT_NODES', false);

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;

        list($locale, $source) = $this->determineLocaleAndSource($source, $node);

        $this->validateEditForm($request, $node, $source);

        $this->determinePublish($request, $node);

        // Recording paused for this, otherwise two records are registered
        chronicle()->pauseRecording();
        $node->update([
            $locale => $request->all()
        ]);
        // and resume
        chronicle()->resumeRecording();


        $this->notify('Page Updated');


        return redirect()->back();
    }

    public function createTranslation($id)
    {
        list($node, $locale, $source) = $this->authorizeAndFindNode($id, null, 'EDIT_NODES');

        if (count($locales = $this->getAvailableLocales($node)) === 0) {
            flash()->error(trans('general.no_available_locales'));

            return redirect()->back();
        }


        $form = $this->getCreateTranslationForm($id, $locales);
        $form->setUrl(route('reactor.pages.translation.store', $id));

        return $this->compileView('pages.translate', compact('form', 'node', 'locale', 'source'), 'Pages Translation');
    }

    public function storeTranslation(Request $request, $id)
    {
        $this->authorize('EDIT_NODES');

        $node = Node::findOrFail($id);

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;


        $this->validateCreateTranslationForm($request);

        $locale = $this->validateLocale($request);

        // Recording paused for this, otherwise two records are registered
        chronicle()->pauseRecording();
        $node->update([
            $locale => $request->all()
        ]);
        // and resume
        chronicle()->resumeRecording();

        $this->notify('general.added_translation', 'created_node_translation', $node);

        return redirect()->route('reactor.pages.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey()
        ]);
    }

    /**
     * Deletes a translation
     *
     * @param int $id
     * @return Response
     */
    public function destroyTranslation($id)
    {
        $this->authorize('EDIT_NODES');

        $source = NodeSource::findOrFail($id);

        $node = $source->node;

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;

        // Prevent deletion if there is only one translation
        if (count($node->translations) > 1) {
            $source->delete();
        }

        $node->load('translations');

        $this->notify('general.destroyed_translation', 'deleted_node_translation', $node);

        return redirect()->route('reactor.pages.edit', [$node->getKey(), $node->translateOrfirst()->getKey()]);
    }
}