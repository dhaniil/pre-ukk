<div class="min-h-screen p-4 space-y-6">
    <div class="relative flex items-center justify-between">
        <h2 class="text-2xl lg:text-4xl font-bold text-left text-blue-600">My Intern</h2>
    </div>

    <flux:separator/>

    <div>
        <h2 class="text-lg font-semibold mb-4 text-blue-500">Data Siswa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl shadow-md border border-blue-100 hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="p-2 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700">Nama</h3>
                </div>
                <p class="ml-12 text-gray-600">{{ $student->name }}</p>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl shadow-md border border-blue-100 hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="p-2 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700">NIS</h3>
                </div>
                <p class="ml-12 text-gray-600">{{ $student->nis }}</p>
            </div>
        </div>
    </div>

    @if($internships)
        <div>
            <h2 class="text-lg font-semibold mb-4">Data Industri</h2>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-lg font-semibold">Nama Industri</h3>
                        <p>{{ $internships->industries->name }}</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative bg-white p-4 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-blue-700">Bidang Usaha</h3>
                        </div>
                        <p class="ml-11 text-gray-600 line-clamp-3">{{ $internships->industries->bidang_usaha }}</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative bg-white p-4 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-blue-700">Alamat</h3>
                        </div>
                        <p class="ml-11 text-gray-600 line-clamp-3">{{ $internships->industries->address }}</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative bg-white p-4 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-blue-700">Kontak</h3>
                        </div>
                        <p class="ml-11 text-gray-600">{{ $internships->industries->contact }}</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative bg-white p-4 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-blue-700">Email</h3>
                        </div>
                        <p class="ml-11 text-gray-600">{{ $internships->industries->email }}</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative bg-white p-4 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-blue-700">Guru Pembimbing</h3>
                        </div>
                        <p class="ml-11 text-gray-600">{{ $internships->industries->teacher->name ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div>
            <h2 class="text-lg font-semibold mb-4">Data Industri</h2>
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md border border-gray-200 text-center">
                <div class="p-4 bg-gray-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data PKL</h3>
                <p class="text-gray-500 mb-4">Anda belum mendaftarkan diri untuk program PKL. Silakan klik tombol di bawah untuk memulai pendaftaran.</p>
            </div>
        </div>
    @endif

    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Periode PKL</h2>
            @if($internships)
                <div class="flex space-x-2">
                    <button wire:click="edit({{ $internships->id }})" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Edit Data PKL
                    </button>
                </div>
            @else
                    <button wire:click="openReportModal" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        Buat Laporan PKL
                    </button>
            @endif
        </div>

        @if($internships)
            <div class="bg-white p-6 rounded-lg shadow border">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-green-50 to-white p-4 rounded-lg border border-green-100">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-green-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8v2m0 0v2m0-2h2m-2 0H8m8-8V7a4 4 0 10-8 0v4h8z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-green-700">Tanggal Mulai</h3>
                        </div>
                        <p class="ml-10 text-gray-600 font-medium">{{ \Carbon\Carbon::parse($internships->mulai)->format('d M Y') }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-red-50 to-white p-4 rounded-lg border border-red-100">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-red-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-red-700">Tanggal Selesai</h3>
                        </div>
                        <p class="ml-10 text-gray-600 font-medium">{{ \Carbon\Carbon::parse($internships->selesai)->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="mt-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-blue-700">Durasi PKL</h3>
                            <p class="text-gray-600">{{ \Carbon\Carbon::parse($internships->mulai)->diffInDays(\Carbon\Carbon::parse($internships->selesai)) + 1 }} hari</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="space-y-4">
                <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md border border-gray-200 text-center">
                    <div class="p-4 bg-gray-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8v2m0 0v2m0-2h2m-2 0H8m8-8V7a4 4 0 10-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Periode PKL Belum Ditentukan</h3>
                    <p class="text-gray-500 mb-4">Silakan tentukan periode PKL Anda dengan mengklik tombol "Tambah Data PKL" di atas.</p>
                </div>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-0 right-0 m-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-0 right-0 m-6 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if($showReportModal)
        <livewire:report-internship />
    @endif

</div>
