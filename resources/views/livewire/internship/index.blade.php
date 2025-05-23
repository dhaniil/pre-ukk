<div class="min-h-screen p-4 space-y-6">
    <div class="relative flex items-center justify-between">
        <h2 class="text-2xl lg:text-4xl font-bold text-left">My Intern</h2>
    </div>
    <flux:separator/>

    <div>
        <h2 class="text-lg font-semibold mb-4">Data Siswa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @if ($student)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Nama</h3>
                    <p>{{ $student->name }}</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">NIS</h3>
                    <p>{{ $student->nis }}</p>
                </div>
            @endif
        </div>
    </div>

    @if ($internships)
        <div>
            <h2 class="text-lg font-semibold mb-4">Data Industri</h2>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-lg font-semibold">Nama Industri</h3>
                        <p>{{ $internships->industries->name }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Bidang Usaha</h3>
                        <p class="line-clamp-3">{{ $internships->industries->bidang_usaha }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Alamat</h3>
                        <p class="line-clamp-3">{{ $internships->industries->address }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Kontak</h3>
                        <p>{{ $internships->industries->contact }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Email</h3>
                        <p>{{ $internships->industries->email }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Guru Pembimbing</h3>
                        <p>{{ $internships->industries->teacher->name ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Periode PKL</h2>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-lg font-semibold">Tanggal Mulai</h3>
                            <p>{{ \Carbon\Carbon::parse($internships->mulai)->format('d F Y') }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Tanggal Selesai</h3>
                            <p>{{ \Carbon\Carbon::parse($internships->selesai)->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Show message and button when no internship data --}}
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="max-w-md mx-auto">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Data PKL</h3>
                <p class="text-gray-600 mb-6">Anda belum memiliki data praktik kerja lapangan. Silakan buat laporan PKL untuk memulai.</p>
                <button 
                    wire:click="$dispatch('open-internship-modal')"
                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Buat Laporan PKL
                </button>
            </div>
        </div>
    @endif

    {{-- Include InternshipReport component --}}
    @livewire('internship-report')

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-0 right-0 m-6 bg-green-500 text-white px-4 py-2 rounded-lg shadow">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-0 right-0 m-6 bg-red-500 text-white px-4 py-2 rounded-lg shadow">
            {{ session('error') }}
        </div>
    @endif
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('open-internship-modal', () => {
            Livewire.dispatch('openModal');
        });
        
        Livewire.on('internship-created', () => {
            location.reload(); // Refresh page to show new data
        });
    });
</script>
