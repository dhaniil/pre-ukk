<div class="min-h-screen space-y-8 bg-gradient-to-br from-blue-50/30 to-white p-6">
    <!-- Header Section -->
    <div class="relative flex items-center justify-between bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                <flux:icon.academic-cap class="w-8 h-8 text-white" />
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">My Internship</h1>
                <p class="text-gray-600">Dashboard PKL Siswa</p>
            </div>
        </div>
    </div>

    <!-- Student Information Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                        <flux:icon.user class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Nama Siswa</h3>
                        <p class="text-gray-600">Identitas siswa</p>
                    </div>
                </div>
            </div>
            <div class="ml-16">
                <p class="text-xl font-semibold text-gray-800">{{ $student->name }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl">
                        <flux:icon.identification class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">NIS</h3>
                        <p class="text-gray-600">Nomor induk siswa</p>
                    </div>
                </div>
            </div>
            <div class="ml-16">
                <p class="text-xl font-semibold text-gray-800">{{ $student->nis }}</p>
            </div>
        </div>
    </div>

    <!-- Industry Information Section -->
    @if($internships)
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl">
                    <flux:icon.building-office class="w-6 h-6 text-white" />
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Informasi Industri</h2>
                    <p class="text-gray-600">Data lengkap tempat PKL</p>
                </div>
            </div>

            <!-- Industry Name -->
            <div class="bg-gradient-to-br from-emerald-50 to-white p-6 rounded-xl border border-emerald-100 mb-4">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="p-2 bg-emerald-100 rounded-lg">
                        <flux:icon.building-office class="w-5 h-5 text-emerald-600" />
                    </div>
                    <h3 class="text-lg font-bold text-emerald-700">Nama Industri</h3>
                </div>
                <p class="ml-12 text-gray-700 font-medium">{{ $internships->industries->name }}</p>
            </div>

            <!-- Industry Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl border border-blue-100">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <flux:icon.briefcase class="w-5 h-5 text-blue-600" />
                        </div>
                        <h3 class="text-lg font-bold text-blue-700">Bidang Usaha</h3>
                    </div>
                    <p class="ml-12 text-gray-700">{{ $internships->industries->bidang_usaha }}</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white p-6 rounded-xl border border-purple-100">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <flux:icon.map-pin class="w-5 h-5 text-purple-600" />
                        </div>
                        <h3 class="text-lg font-bold text-purple-700">Alamat</h3>
                    </div>
                    <p class="ml-12 text-gray-700">{{ $internships->industries->address }}</p>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-white p-6 rounded-xl border border-orange-100">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="p-2 bg-orange-100 rounded-lg">
                            <flux:icon.phone class="w-5 h-5 text-orange-600" />
                        </div>
                        <h3 class="text-lg font-bold text-orange-700">Kontak</h3>
                    </div>
                    <p class="ml-12 text-gray-700">{{ $internships->industries->contact }}</p>
                </div>

                <div class="bg-gradient-to-br from-teal-50 to-white p-6 rounded-xl border border-teal-100">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="p-2 bg-teal-100 rounded-lg">
                            <flux:icon.envelope class="w-5 h-5 text-teal-600" />
                        </div>
                        <h3 class="text-lg font-bold text-teal-700">Email</h3>
                    </div>
                    <p class="ml-12 text-gray-700">{{ $internships->industries->email }}</p>
                </div>
            </div>

            <!-- Supervising Teacher -->
            <div class="bg-gradient-to-br from-indigo-50 to-white p-6 rounded-xl border border-indigo-100 mt-4">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="p-2 bg-indigo-100 rounded-lg">
                        <flux:icon.user-circle class="w-5 h-5 text-indigo-600" />
                    </div>
                    <h3 class="text-lg font-bold text-indigo-700">Guru Pembimbing</h3>
                </div>
                <p class="ml-12 text-gray-700 font-medium">{{ $internships->industries->teacher->name ?? 'Belum ditentukan' }}</p>
            </div>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200 text-center">
            <div class="p-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                <flux:icon.building-office class="w-12 h-12 text-gray-400" />
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Belum Ada Data PKL</h3>
            <p class="text-gray-500 mb-6 max-w-md mx-auto">Anda belum mendaftarkan diri untuk program PKL. Silakan hubungi guru pembimbing untuk mendaftar.</p>
        </div>
    @endif

    <!-- Internship Period Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl">
                    <flux:icon.calendar class="w-6 h-6 text-white" />
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Periode PKL</h2>
                    <p class="text-gray-600">Waktu pelaksanaan PKL</p>
                </div>
            </div>
            @if($internships)
                <flux:button wire:click="edit({{ $internships->id }})" variant="outline" icon="pencil" class="bg-yellow-50 border-yellow-200 text-yellow-700 hover:bg-yellow-100">
                    Edit Data PKL
                </flux:button>
            @else
                <flux:button wire:click="openReportModal" variant="filled" icon="document-plus" class="bg-green-600 hover:bg-green-700">
                    Buat Laporan PKL
                </flux:button>
            @endif
        </div>
        @if($internships)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-br from-green-50 to-white p-6 rounded-xl border border-green-100">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <flux:icon.play class="w-5 h-5 text-green-600" />
                        </div>
                        <h3 class="text-lg font-bold text-green-700">Tanggal Mulai</h3>
                    </div>
                    <p class="ml-14 text-xl font-semibold text-gray-800">{{ \Carbon\Carbon::parse($internships->mulai)->format('d M Y') }}</p>
                </div>

                <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-xl border border-red-100">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <flux:icon.stop class="w-5 h-5 text-red-600" />
                        </div>
                        <h3 class="text-lg font-bold text-red-700">Tanggal Selesai</h3>
                    </div>
                    <p class="ml-14 text-xl font-semibold text-gray-800">{{ \Carbon\Carbon::parse($internships->selesai)->format('d M Y') }}</p>
                </div>
            </div>

            <!-- Duration Card -->
            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl border border-blue-100 mt-4">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <flux:icon.clock class="w-5 h-5 text-blue-600" />
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-blue-700">Durasi PKL</h3>
                        <p class="text-xl font-semibold text-gray-800">{{ \Carbon\Carbon::parse($internships->mulai)->diffInDays(\Carbon\Carbon::parse($internships->selesai)) + 1 }} hari</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md border border-gray-200 text-center">
                <div class="p-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                    <flux:icon.calendar-days class="w-12 h-12 text-gray-400" />
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Periode PKL Belum Ditentukan</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto">Silakan tentukan periode PKL Anda dengan mengklik tombol "Edit Data PKL" di atas.</p>
            </div>
        @endif
    </div>

    <!-- Notifications -->
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-0 right-0 m-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <flux:icon.check-circle class="w-5 h-5" />
            <span>{{ session('message') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-0 right-0 m-6 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <flux:icon.exclamation-circle class="w-5 h-5" />
            <span>{{ session('error') }}</span>
        </div>
    @endif



</div>
