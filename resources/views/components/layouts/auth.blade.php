<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-zinc-50 dark:bg-zinc-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-zinc-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-6 text-center">

            </div>

            {{ $slot }}
        </div>
    </div>

    @fluxScripts
</body>
</html>
