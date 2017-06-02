<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'motionhub')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./images/logo-icon.png" type="image/x-icon"/>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
@include('layouts._header')

@yield('content')

</body>
</html>