<div class="dropdown">
    <button class="btn btn-primary btn-xs dropdown-toggle " type="button" data-toggle="dropdown">{!! __('Options') !!}
        <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a href="{!! route('reactor.review.change_status',[$node->id]) !!}">Change Status</a>
        </li>
        <li>
            <a href="{!! route('reactor.reviews.destroy',[$node->id]) !!}">Delete </a>
        </li>
    </ul>


</div>
