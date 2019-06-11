<div id="results">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4><strong>{!! ($nodes ? count($nodes) : 0) !!} results found</strong></h4>
            </div>
            <div class="col-md-6">
                {{ Form::open(['url' => 'search', 'method' => 'get']) }}
                <div class="search_bar_list">
                    <select name="q" id="select2_search" class="form-control">
                        <option value="" selected>Speciality..</option>
                        @foreach($tags as $tag)
                            <option value="{!! $tag->tag_name !!}">{!! $tag->title !!}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Search"/>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /results -->