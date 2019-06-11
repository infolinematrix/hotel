<div class="box-body clearfix">
    <h4 class="form-section__heading">{{ uppercase(trans('nodes.seo')) }}</h4>
    {{-- We had to do this separately since form_until included meta_title as well --}}
    {!! form_row($form->meta_title) !!}
    {!! form_row($form->meta_keywords) !!}
    {!! form_row($form->meta_description) !!}
</div>