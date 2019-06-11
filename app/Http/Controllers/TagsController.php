<?php


namespace ReactorCMS\Http\Controllers;


use Illuminate\Http\Request;
use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Http\Controllers\Traits\BasicResource;
use ReactorCMS\Http\Controllers\Traits\UsesTagForms;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;

class TagsController extends ReactorController
{

    use BasicResource, UsesTagForms, UsesTranslations {
        edit as _edit;
        update as _update;
    }

    /**
     * Names for the BasicResource trait
     *
     * @var string
     */
    protected $modelPath = Tag::class;
    protected $resourceMultiple = 'tags';
    protected $resourceSingular = 'tag';
    protected $permissionKey = 'TAGS';
    protected $translatable = true;

    /**
     * Show the form for editing the specified resources translation.
     *
     * @param  int $id
     * @param  int $translation
     * @return \Illuminate\Http\Response
     */


    public function edit($id, $translation)
    {
        $item = Tag::findOrFail($id);

        list($locale, $translation) = $this->determineLocaleAndTranslation($translation, $item);

        $form = $this->getEditForm($id, $translation);

        $form->add('meta_title','text',[

        ]);
        
        $form->add('meta_keyword','text',[

        ]);
        $form->add('meta_description','textarea',[
            'attr' => ['rows'=> 3]
        ]);
        $form->add('popular','select',[
            'choices' => ['0' => 'No','1' => 'Yes'],
        ]);
        
        return $this->compileView('tags.edit', compact('form','translate','locale'));
    }

    /**
     * Update the specified resources translation in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param  int $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $translation)
    {
        return $this->updateTranslated($request, $id, $translation);
    }

    /**
     * Adds a translation to the resource
     *
     * @param  int $id
     * @param int|null $translation
     * @return \Illuminate\Http\Response
     */
    public function createTranslation($id, $translation)
    {
        $this->authorize('EDIT_TAGS');

        $tag = Tag::findOrFail($id);

        list($locale, $translation) = $this->determineLocaleAndTranslation($translation, $tag);

        if (count($locales = $this->getAvailableLocales($tag)) === 0) {
            flash()->error(trans('general.no_available_locales'));

            return redirect()->back();
        }

        $form = $this->getCreateTranslationForm($tag, $locales);

        return $this->compileView('tags.translate', compact('form', 'tag', 'translation'), trans('general.add_translation'));
    }

    /**
     * Stores a translation in the resource
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function storeTranslation(Request $request, $id)
    {
        $this->authorize('EDIT_TAGS');

        $tag = Tag::findOrFail($id);

        $this->validateCreateTranslationForm($request);

        $locale = $this->validateLocale($request);

        $tag->update([
            $locale => $request->all()
        ]);

        $this->notify('general.added_translation');

        return redirect()->route('reactor.tags.edit', [
            $tag->getKey(),
            $tag->translate($locale)->getKey()
        ]);
    }

    /**
     * Determines the current editing locale
     *
     * @param int $translation
     * @param Tag $tag
     * @return string
     */
    protected function determineLocaleAndTranslation($translation, Tag $tag)
    {
        $translation = $tag->translations->find($translation);

        if (is_null($translation)) {
            abort(404);
        }

        return [$translation->locale, $translation];
    }

    /**
     * List the specified resource fields.
     *
     * @param int $id
     * @param int $translation
     * @return Response
     */
    public function nodes($id, $translation)
    {
        $this->authorize('ACCESS_NODES');

        $tag = Tag::findOrFail($id);

        list($locale, $translation) = $this->determineLocaleAndTranslation($translation, $tag);

        $nodes = $tag->nodes()
            ->sortable()->paginate();

        return $this->compileView('tags.nodes', compact('tag', 'nodes', 'translation'), trans('nodes.title'));
    }

    /**
     * Returns the collection of retrieved nodes by json response
     *
     * @param Request $request
     * @return Response
     */
    public function searchJson(Request $request)
    {
        $tags = Tag::search($request->input('q'), 20, true)
            ->groupBy('id')->limit(10)->get();

        $locale = $request->input('locale', null);

        $results = [];

        foreach ($tags as $tag) {
            $results[$tag->getKey()] = [
                'title' => $tag->translate($locale, true)->title,
                'translatable' => $tag->canHaveMoreTranslations(),
                'editurl' => route('reactor.tags.edit', [$tag->getKey(), $tag->translate()->getKey()]),
                'translateurl' => route('reactor.tags.translations.create', [$tag->getKey(), $tag->translate()->getKey()])
            ];
        }

        return response()->json($results);
    }

    public function publish($id)
    {
        //return $this->changeNodeStatus($id, 'publish', 'published');

        $status = 'publish';

        $message = 'published';

        $tag = Tag::findOrFail($id);

        $tag->{$status}()->save();

        $this->notify($message);

        return redirect()->back();
    }

    /**
     * Unpublishes the specified resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function unpublish($id)
    {
        $status = 'unpublish';

        $message = 'unpublished';

        $tag = Tag::findOrFail($id);

        $tag->{$status}()->save();

        $this->notify($message);

        return redirect()->back();
    }


}