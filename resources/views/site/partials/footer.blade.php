<footer class="footer">
    <div class="footer__inner container">


        <div class="navigation__links footer__links">
            @foreach(locales() as $locale)
                @if($locale === app()->getLocale())
                    <span class="navigation__link footer__link footer__link--active">{{ uppercase(trans('general.' . $locale, [], 'messages', $locale), $locale) }}</span>
                @else
                    <a class="navigation__link footer__link" href="{{
                    (isset($isNode) && $isNode && $node->hasTranslation($locale)) ?
                        $node->getSiteURL($locale) :
                        route('locale.set.home', $locale)
                    }}">{{ uppercase(trans('general.' . $locale, [], 'messages', $locale), $locale) }}</a>
                @endif
            @endforeach
        </div>

    </div>
</footer>