<form action="{{ route('reactor.' . $key . '.search') }}" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" value="{{ request('q') }}"
               placeholder="{{ trans($key . '.search') }}...">
        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
    </div>
</form>

