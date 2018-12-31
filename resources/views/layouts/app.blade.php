<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/app.css">

    <title>Photoshow</title>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-9">
            @include('inc.topbar')
            @include('inc.message')
            @yield('content')
        </div>
    </div>

</div>


</body>
</html>