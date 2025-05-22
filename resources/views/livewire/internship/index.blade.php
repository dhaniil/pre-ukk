<div class="min-h-screen p-4 space-y-6">
    <div class="relative flex items-center justify-between">
        <h2 class="text-2xl lg:text-4xl font-bold text-left">My Intern</h2>
    </div>
    <flux:separator/>

    <div>
        <h2 class="text-lg font-semibold mb-4">Data Siswa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2  gap-8">
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
            <button wire:click="create" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Data PKL
            </button>
        </div>


    </div>



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
