<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire CRUD</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    @livewireStyles
</head>
<body>
<br>
<div class="container">
    @yield('content')
</div>

@livewireScripts
</body>
</html>
