<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#563d7c">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/offcanvas.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<div id="app">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand mr-auto mr-lg-0" href="#">Offcanvas navbar</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto"></ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="nav-scroller bg-white shadow-sm mb-4">
        <nav class="nav nav-underline">
            <router-link class="nav-link active" :to="{name:'#home'}">Dashboard</router-link>
            <router-link class="nav-link" :to="{name:'#tickets'}">Tickets</router-link>
            <router-link class="nav-link" :to="{name:'#settings'}">Settings</router-link>
        </nav>
    </div>

    <main role="main" class="container-fluid">
        <router-view></router-view>
    </main>
</div>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/offcanvas.js') }}"></script>
</body>
</html>
