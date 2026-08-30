<!DOCTYPE html>
<html>
    <head>
        <title>Laravel task list app</title>
        @yield('styles')
    </head>
    <body>
        @if (session()->has('success'))
            <div>{{ session()->get('success') }}</div>
        @endif
        <h1>@yield('title')</h1>
        <div>@yield('content')</div>
    </body>
</html>
