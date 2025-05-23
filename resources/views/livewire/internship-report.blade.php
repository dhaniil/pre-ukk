{{-- Modal for Internship Report --}}
<div>
    {{-- Modal backdrop --}}
    <div x-show="$wire.showModal" 
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none"
         style="background-color: rgba(0, 0, 0, 0.5);">
        
        {{-- Modal dialog --}}
        <div class="relative w-full max-w-4xl mx-auto my-6">
            {{-- Modal content --}}
            <div class="bg-white rounded-3xl shadow-2xl relative flex flex-col w-full outline-none focus:outline-none border-0 max-h-[90vh] overflow-hidden">
                
                {{-- Modal header --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6 rounded-t-3xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Form Laporan PKL</h3>
                                <p class="text-blue-100">Lengkapi formulir di bawah ini untuk membuat laporan PKL</p>
                            </div>
                        </div>
                        <button wire:click="closeModal"
                                type="button"
                                class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 rounded-full p-2 transition-all duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Modal body --}}
                <div class="relative p-8 flex-auto overflow-y-auto max-h-[calc(90vh-160px)]">
                    {{-- Form --}}
                    <form wire:submit="create" class="space-y-6">
                        @csrf

                        {{-- Form fields container --}}
                        <div class="bg-gradient-to-r from-gray-50 to-slate-50 rounded-2xl p-6 border border-gray-100">
                            <div class="space-y-6">
                                {{ $this->form }}
                            </div>
                        </div>

                        {{-- Action buttons --}}
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <button type="button"
                                    wire:click="closeModal"
                                    class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-200">
                                Batal
                            </button>
                            
                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    class="group relative px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 disabled:opacity-50">

                                {{-- Loading state --}}
                                <span wire:loading.remove wire:target="create" class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Laporan
                                </span>

                                {{-- Loading spinner --}}
                                <span wire:loading wire:target="create" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Menyimpan...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Filament notifications --}}
    <x-filament-actions::modals />
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
