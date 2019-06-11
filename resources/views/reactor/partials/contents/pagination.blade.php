<div class="pagination-container">
    @if ($paginator->lastPage() > 1)
        <div class="pagination {{ $paginationModifier or '' }}">

            @if($paginator->currentPage() === 1)
                <span class="pagination__sibling pagination__sibling--disabled">
            <i class="icon-arrow-left"></i>
        </span>
            @else
                <a class="pagination__sibling" href="{{ $paginator->url($paginator->currentPage() - 1) }}">
                    <i class="icon-arrow-left"></i>
                </a>
            @endif

            <div class="pagination__current-container">

            <span class="pagination__current">
                {{ uppercase(trans('general.page')) . ' ' . $paginator->currentPage() . '/' . $paginator->lastPage() }}
                :
            </span>


                <select class="pagination__selector" id="dynamic_select">
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <option value="{{ $paginator->url($i) }}"{{ $paginator->currentPage() === $i ? ' selected="selected"': '' }}>{{ $i }}</option>
                    @endfor
                </select>


            </div>

            @if($paginator->currentPage() === $paginator->lastPage())
                <span class="pagination__sibling pagination__sibling--disabled">
            <i class="icon-arrow-right"></i>
        </span>
            @else
                <a class="pagination__sibling" href="{{ $paginator->url($paginator->currentPage() + 1) }}">
                    <i class="icon-arrow-right"></i>
                </a>
            @endif
        </div>
    @endif
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {
            // bind change event to select
            $('#dynamic_select').on('change', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>

@endsection