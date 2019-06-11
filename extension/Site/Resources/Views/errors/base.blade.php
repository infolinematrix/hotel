<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    {!! Theme::css('styles/bootstrap.min.css') !!}
    {!! Theme::css('plugins/font-awesome/css/font-awesome.min.css') !!}
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #585858;
            display: table;
            font-weight: 300;
            font-family: 'Lato';
        }

        a {
            color: black;
        }

        p {
            font-size: 14px
        }

        img {
            width: 6em;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .container {
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            display: block;
            margin-top: 10%;
        }

        .content {
            text-align: center;
            display: inline-block;
            padding: 1em
        }

        .title {
            font-size: 4.5em;
            margin-bottom: 0.5em;
            font-weight: 100;
            color: #BDC3C7;
        }

        .name {
            font-size: 2em;
        }

        .description {
            font-size: 0.875em
        }

        body {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
        }

        .error-template {
            padding: 40px 15px;
            text-align: center;
        }

        .error-actions {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .error-actions .btn {
            margin-right: 10px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="content">
        @yield('image')
        <div class="title">@yield('code')</div>
        <div class="name">@yield('title')</div>
        <div class="description">@yield('description')</div>
    </div>
</div>
</body>
</html>
