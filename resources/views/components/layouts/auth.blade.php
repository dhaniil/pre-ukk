<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">

        <!-- Logo/Brand Section -->
        <div class="mb-6">
            <div class="flex items-center justify-center gap-2">
                <div class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center">
                    <flux:icon.academic-cap class="text-white size-5" />
                </div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">PKL Stembayo</h1>
            </div>
        </div>

        <!-- Auth Card -->
        <div class="w-full sm:max-w-md bg-white dark:bg-gray-800 shadow-md border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <div class="p-6">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-center">
            <p class="text-xs text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} PKL Stembayo
            </p>
        </div>
    </div>

    @fluxScripts
</body>
</html>
