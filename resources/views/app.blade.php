<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Laravel TNTSearch</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <div id="app" class="relative items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4">

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center sm:pt-0">
                <div class="flex">
                    <h1 class="h-16 text-3xl font-bold">Laravel - TNTSearch</h1>
                </div>
            </div>
        </div>
        <div class="mt-8 bg-white w-80 mx-auto">
            <search-product />
        </div>
        <div class="mt-8 w-full bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="flex  px-8" style="max-height: 35rem;">
                <div class="px-2 py-1 w-1/2 border-r-2 overflow-x-scroll">
                    <all-products />
                </div>

                <div class="px-2 py-1 w-1/2 overflow-x-scroll">
                    <result-tnt />
                </div>
            </div>
        </div>
    </div>
</body>

</html>
