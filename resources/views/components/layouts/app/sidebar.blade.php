<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 dark:from-zinc-900 dark:to-slate-900">
<div class="flex h-screen">
    <flux:sidebar sticky stashable class="h-full border-e border-slate-200/50 bg-gradient-to-b from-white/95 to-slate-50/95 dark:border-slate-700/50 dark:from-zinc-900/95 dark:to-slate-900/95 backdrop-blur-sm min-w-[280px] w-1/5 shadow-xl">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <div class="p-6 border-b border-slate-200/50 dark:border-slate-700/50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg">
                    <flux:icon.academic-cap variant="mini" class="text-white" />
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 dark:text-white">SIM Stembayo</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Harus e design sim stembayo gini</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="p-4 space-y-2">
            <div class="mb-4">
                <h4 class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-3">Menu Utama</h4>

                @role('student')
                <a href="{{ route('student.dashboard') }}" wire:navigate
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('student.dashboard') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white shadow-lg shadow-cyan-500/25' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white' }}">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <flux:icon.squares-2x2 variant="mini" class="{{ request()->routeIs('student.dashboard') ? 'text-white' : 'text-slate-500 dark:text-slate-400 group-hover:text-cyan-500' }}" />
                    </div>
                    <span class="font-medium">Dashboard Siswa</span>
                    @if(request()->routeIs('student.dashboard'))
                        <div class="ml-auto w-2 h-2 rounded-full bg-white/30"></div>
                    @endif
                </a>

                @endrole

                @role('teacher')
                <a href="{{ route('teacher.dashboard') }}" wire:navigate
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('teacher.dashboard') ? 'bg-gradient-to-r from-emerald-500 to-teal-600 text-white shadow-lg shadow-emerald-500/25' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white' }}">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <flux:icon.academic-cap variant="mini" class="{{ request()->routeIs('teacher.dashboard') ? 'text-white' : 'text-slate-500 dark:text-slate-400 group-hover:text-emerald-500' }}" />
                    </div>
                    <span class="font-medium">Dashboard Guru</span>
                    @if(request()->routeIs('teacher.dashboard'))
                        <div class="ml-auto w-2 h-2 rounded-full bg-white/30"></div>
                    @endif
                </a>
                @endrole
                <a href="{{ route('industry.dashboard') }}" wire:navigate
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('industry.dashboard') ? 'bg-gradient-to-r from-emerald-500 to-teal-600 text-white shadow-lg shadow-emerald-500/25' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white' }}">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <flux:icon.map-pin-house variant="mini" class="{{ request()->routeIs('industry.dashboard') ? 'text-white' : 'text-slate-500 dark:text-slate-400 group-hover:text-emerald-500' }}" />
                    </div>
                    <span class="font-medium">Daftar Industri</span>
                    @if(request()->routeIs('industry.dashboard'))
                        <div class="ml-auto w-2 h-2 rounded-full bg-white/30"></div>
                    @endif
                </a>
            </div>

            <!-- Quick Stats Card -->
            <div class="mt-6 p-4 rounded-xl bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800/50 dark:to-slate-900/50 border border-slate-200/50 dark:border-slate-700/50">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center">
                        <flux:icon.chart-bar variant="mini" class="text-white" />
                    </div>
                    <div>
                        <h5 class="font-semibold text-slate-900 dark:text-white text-sm">Status PKL</h5>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-600 dark:text-slate-400">Siswa Aktif</span>
                        <span class="font-medium text-slate-900 dark:text-white">{{ App\Models\User::role('student')->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-600 dark:text-slate-400">Industri</span>
                        <span class="font-medium text-slate-900 dark:text-white">{{ App\Models\Industries::count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <flux:spacer />

        <!-- Theme Toggle -->
        <div class="p-4 border-t border-slate-200/50 dark:border-slate-700/50">
            <div class="mb-4">
                <h5 class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-3">Pengaturan</h5>

                <flux:dropdown align="start" class="w-full">
                    <flux:button variant="subtle" class="group w-full justify-start gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-all duration-200">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <flux:icon.sun x-show="$flux.appearance === 'light'" variant="mini" class="text-amber-500" />
                            <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="mini" class="text-slate-400" />
                            <flux:icon.computer-desktop x-show="$flux.appearance === 'system'" variant="mini" class="text-slate-500" />
                        </div>
                        <span class="font-medium">Tema</span>
                        <flux:icon.chevron-down variant="mini" class="ml-auto w-4 h-4 text-slate-400" />
                    </flux:button>

                    <flux:menu class="w-48">
                        <flux:menu.item x-on:click="$flux.appearance = 'light'" class="gap-3">
                            <flux:icon.sun variant="mini" class="text-amber-500" />
                            <span class="text-sm">Terang</span>
                        </flux:menu.item>
                        
                        <flux:menu.item x-on:click="$flux.appearance = 'dark'" class="gap-3">
                            <flux:icon.moon variant="mini" class="text-slate-400" />
                            <span class="text-sm">Gelap</span>
                        </flux:menu.item>
                        
                        <flux:menu.item x-on:click="$flux.appearance = 'system'" class="gap-3">
                            <flux:icon.computer-desktop variant="mini" class="text-slate-500" />
                            <span class="text-sm">Sistem</span>
                        </flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-t border-slate-200/50 dark:border-slate-700/50">
            <flux:dropdown position="top" align="start" class="w-full">
                <flux:button variant="subtle" class="w-full p-0 h-auto">
                    <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800/50 dark:to-slate-900/50 border border-slate-200/50 dark:border-slate-700/50 hover:border-slate-300 dark:hover:border-slate-600 transition-all duration-200 w-full">
                        <div class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-xl">
                            <div class="flex h-full w-full items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-semibold text-sm shadow-lg">
                                {{ auth()->user()->initials() }}
                            </div>
                        </div>
                        <div class="flex-1 text-left min-w-0">
                            <div class="font-semibold text-slate-900 dark:text-white truncate text-sm">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ auth()->user()->email }}</div>
                        </div>
                        <flux:icon.chevron-up variant="mini" class="w-4 h-4 text-slate-400 flex-shrink-0" />
                    </div>
                </flux:button>

                <flux:menu class="w-64 max-w-none">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-3 px-4 py-3 text-start text-sm border-b border-slate-100 dark:border-slate-700">
                                <div class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <div class="flex h-full w-full items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-semibold text-xs">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-medium text-slate-900 dark:text-white truncate text-sm">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" wire:navigate class="gap-3 px-4 py-2">
                            <flux:icon.cog-6-tooth variant="mini" class="text-slate-500" />
                            <span class="text-sm">{{ __('Pengaturan') }}</span>
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" class="w-full gap-3 px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                            <flux:icon.arrow-right-start-on-rectangle variant="mini" class="text-red-500" />
                            <span class="text-sm">{{ __('Keluar') }}</span>
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </div>
    </flux:sidebar>

    <!-- Mobile Header -->
    <flux:header class="lg:hidden absolute top-0 left-0 w-full z-10 bg-white/95 dark:bg-zinc-900/95 backdrop-blur-sm border-b border-slate-200/50 dark:border-slate-700/50">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <!-- Mobile Logo -->
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg">
                <flux:icon.academic-cap variant="mini" class="text-white" />
            </div>
            <span class="font-bold text-slate-900 dark:text-white">PKL System</span>
        </div>

        <flux:spacer />

        <!-- Mobile User Menu -->
        <flux:dropdown position="top" align="end">
            <flux:button variant="subtle" class="p-0">
                <div class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                    <div class="flex h-full w-full items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-semibold text-xs">
                        {{ auth()->user()->initials() }}
                    </div>
                </div>
            </flux:button>

            <flux:menu class="w-72 max-w-none">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-3 px-4 py-3 text-start text-sm border-b border-slate-100 dark:border-slate-700">
                            <div class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <div class="flex h-full w-full items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-semibold text-xs">
                                    {{ auth()->user()->initials() }}
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-medium text-slate-900 dark:text-white truncate text-sm">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" wire:navigate class="gap-3 px-4 py-2">
                        <flux:icon.cog-6-tooth variant="mini" class="text-slate-500" />
                        <span class="text-sm">{{ __('Pengaturan') }}</span>
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" class="w-full gap-3 px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                        <flux:icon.arrow-right-start-on-rectangle variant="mini" class="text-red-500" />
                        <span class="text-sm">{{ __('Keluar') }}</span>
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    <!-- Main Content Area -->
    <div class="flex-1 w-full overflow-auto bg-gradient-to-br from-slate-50 to-blue-50 dark:from-zinc-900 dark:to-slate-900">
        <div class="p-6 lg:pt-6 pt-20">
            {{ $slot }}
        </div>
    </div>
</div>

    @fluxScripts

    @stack('scripts')

</body>

</html>
