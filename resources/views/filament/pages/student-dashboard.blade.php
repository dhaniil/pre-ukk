<x-filament-panels::page x-data="{ activeTab: 'pkl' }">
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Welcome, {{ auth()->user()->name }}
        </h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">
            Berikut adalah data PKL dan industri yang tersedia
        </p>
    </div>

    <div class="fi-tabs flex overflow-x-auto items-center gap-x-1 bg-white dark:bg-gray-900 rounded-xl">
        <button 
            type="button" 
            x-on:click="$dispatch('tab-selected', 'pkl')" 
            :class="{ 'bg-primary-100 text-primary-600': activeTab === 'pkl' }"
            class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-white/5 dark:focus:bg-white/5">
            PKL Saya
        </button>
        <button 
            type="button" 
            x-on:click="$dispatch('tab-selected', 'industri')" 
            :class="{ 'bg-primary-100 text-primary-600': activeTab === 'industri' }"
            class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-white/5 dark:focus:bg-white/5">
            Daftar Industri
        </button>
    </div>
    
    <div @tab-selected.window="activeTab = $event.detail">
        <div x-show="activeTab === 'pkl'" class="mt-4">
            @livewire(\App\Filament\Widgets\StudentInternshipList::class)
        </div>
        <div x-show="activeTab === 'industri'" class="mt-4">
            @livewire(\App\Filament\Widgets\IndustriesList::class)
        </div>
    </div>
</x-filament-panels::page>
