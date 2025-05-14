<div>
    <x-filament::button
        wire:click="buttonModal"
        class="bg-red-500">
        Open
    </x-filament::button>

    @if($openModal)
        <div class="fixed inset-0 bg-black bg-opacity-10 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                <h1 class="text-2xl font-semibold mb-4 text-black">Modal Test</h1>
                <x-filament::button wire:click="$set('openModal', false)" class="bg-gray-500 mt-4">Close</x-filament::button>
            </div>
        </div>
    @endif
</div>
