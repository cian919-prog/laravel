<!DOCTYPE html>
<html>
    <head>
        <title>Laravel task list app</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @yield('styles')
                {{--blade-formatter-disable --}}
        <style type="text/tailwindcss">

        .btn {
            @apply text-red-600 hover:text-red-800

        }

        label {
            @apply block mb-2 font-medium text-gray-700
        }
        input, textarea {
            @apply w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 text-red-400
        }
        .error  {
            @apply text-red-600 hover:text-red-800
        }
        </style>
        {{--blade-formatter-enable --}}
    </head>

    <body class="container mx-auto mt-10 mb-10 max-w-lg ">
        @if (session()->has('success'))
            <div>{{ session()->get('success') }}</div>
        @endif
        <h1 class="text-2xl mb-4 mt-4">@yield('title')</h1>
        <div>@yield('content')</div>
    </body>
</html>
