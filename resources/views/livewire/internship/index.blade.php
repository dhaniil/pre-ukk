<div class="p-6 bg-white dark:bg-zinc-800 rounded-lg min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Data PKL Saya</h2>
        <button wire:click="create"
            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-105">
            Tambah PKL Baru
        </button>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-100 font-medium">
            {{ session('message') }}
        </div>
    @endif

    <!-- Card Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($internships as $internship)
            <div class="bg-white dark:bg-zinc-900 rounded-xl shadow-lg overflow-hidden transform transition-all duration-200 hover:scale-105 hover:shadow-xl">
                <div class="h-2 bg-gradient-to-r from-blue-500 to-indigo-500"></div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $internship->industries->name }}</h3>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            {{ now()->between($internship->mulai, $internship->selesai)
                                ? 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-100'
                                : (now()->lt($internship->mulai)
                                    ? 'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-100'
                                    : 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100') }}">
                            {{ now()->between($internship->mulai, $internship->selesai)
                                ? 'Sedang PKL'
                                : (now()->lt($internship->mulai)
                                    ? 'Akan Dimulai'
                                    : 'Selesai') }}
                        </span>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-sm">{{ $internship->industries->bidang_usaha }}</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm">
                                {{ \Carbon\Carbon::parse($internship->mulai)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($internship->selesai)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm">{{ $internship->industries->address }}</span>
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-3">
                        <button wire:click="edit({{ $internship->id }})"
                            class="flex-1 px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-100 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                            Edit
                        </button>
                        <button wire:click="delete({{ $internship->id }})"
                            onclick="confirm('Apakah Anda yakin ingin menghapus data ini?') || event.stopImmediatePropagation()"
                            class="flex-1 px-4 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-100 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="text-center py-12 bg-white dark:bg-zinc-900 rounded-lg">
                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">Belum ada data PKL</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Mulai tambahkan data PKL Anda dengan klik tombol di atas.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Modal -->
    @if($openModal)
        <div class="fixed inset-0 bg-white/80 bg-opacity-60 backdrop-blur-xs flex items-center justify-center z-50">
            <div class="bg-white dark:bg-zinc-900/10 p-6 rounded-lg max-w-lg w-full shadow-xl transform transition-all">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $internshipId ? 'Edit Data PKL' : 'Tambah PKL Baru' }}
                    </h3>
                    <button wire:click="resetForm" class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-400">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="{{ $internshipId ? 'update' : 'store' }}" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Industri</label>
                        <select wire:model="industries_id"
                            class="w-full border border-gray-300 dark:border-zinc-700 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100">
                            <option value="" class="mx-auto px-auto">Pilih Industri</option>
                            @foreach($industries as $industry)
                                <option class="mx-auto px-auto" value="{{ $industry->id }}">{{ $industry->name }}</option>
                            @endforeach
                        </select>
                        @error('industries_id')
                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Mulai</label>
                        <input type="date" wire:model="mulai"
                            class="w-full border border-gray-300 dark:border-zinc-700 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100">
                        @error('mulai')
                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Selesai</label>
                        <input type="date" wire:model="selesai"
                            class="w-full border border-gray-300 dark:border-zinc-700 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100">
                        @error('selesai')
                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" wire:click="resetForm"
                            class="px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                            {{ $internshipId ? 'Simpan Perubahan' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
