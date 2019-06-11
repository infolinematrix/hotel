

@if (session()->get('flash_notification.message'))

    {!! dd("Sa") !!}
    <p class="alert">
        {!! session('flash_notification.message') !!}
    </p>

@endif