<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {!! (!empty($title) ? strtoupper($title) : 'NO-TITLE') !!}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{!! route('reactor.dashboard') !!}"><i class="fa fa-dashboard"></i> {!! __('Dashboard') !!}</a>
        </li>

        @if(!empty($node))

            <li><a href="{!! route('reactor.nodes.index') !!}"> {!! __('Nodes') !!}</a></li>

            @if(count($node->getAncestors()))



                <li>{!! $node->getTitle() !!}</li>

            @endif
        @else

        @endif

    </ol>
</section>

@include('partials.flash')