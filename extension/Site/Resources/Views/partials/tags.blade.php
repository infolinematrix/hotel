<div class="form-group">
    <label>Search Keywords</label>
    @if($node->isTaggable())
        <div class="form-section" id="nodesTags"
             data-nodeid="{{ $node->getKey() }}"
             data-locale="en"
             data-searchurl="{{ route('member.tags.search.json') }}"
             data-storeurl="{{ route('member.nodes.tags.store', $node->getKey()) }}"
             data-attachurl="{{ route('member.nodes.tags.attach', $node->getKey()) }}"
             data-detachurl="{{ route('member.nodes.tags.detach', $node->getKey()) }}">
            <h4 class="form-section__heading">{{ uppercase(trans('tags.title')) }}</h4>
            <ul class="tags-list tags-list--compact">
                @foreach($tags as $tag)
                    <li class="tag" data-tagid="{{ $tag->getKey() }}">

            <span class="tag__text">
                {!!  $tag->translate($locale, true)->title !!}
            </span>

            <span class="tag__option tag__option--detach">
                <i class="fa fa-remove text-danger"></i>
            </span>

                        @if($tag->canHaveMoreTranslations())
                            <span class="tag__option tag__option--translate">
                <a href="{{ route('reactor.tags.translations.create', [$tag->getKey(), $tag->translate()->getKey()]) }}"
                   target="_blank">
                    <i class="fa fa-globe text-info"></i>
                </a>
            </span>
                        @endif

                    </li>
                @endforeach
            </ul>

            @if( ! $node->isLocked())
                <div class="related-search">

                    <input class="related-search__search" type="text" name="_relatedsearch"
                           placeholder="{{ trans('tags.type_to_add') }}" autocomplete="off">
                    <p class="related-search__hint">{{ trans('tags.use_keys_to_separate') }}</p>

                    <ul class="related-search__results">

                    </ul>
                </div>
            @endif
        </div>
    @endif
</div>