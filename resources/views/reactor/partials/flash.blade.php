@if (session()->has('message'))
    <div class="alert alert-success" id="flashContainer">
            <i class="fa fa-adjust"></i>
            {{ session('message') }}
    </div>
@endif