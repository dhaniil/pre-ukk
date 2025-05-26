<div class="min-h-screen space-y-6">
    <div class="flex flex-col gap-2">
        <div class="flex gap-2 items-center">
            <flux:icon.square-user-round class="text-cyan-700 dark:text-cyan-300 size-12"/>
            <flux:separator vertical />
            <h2 class="text-2xl lg:text-4xl font-bold text-cyan-700 dark:text-cyan-300">Dashboard Guru</h2>
        </div>
        <div>
            <flux:subheading  class="mb-6">Selamat datang di dashboard guru, {{ auth()->user()->name }}!</flux:subheading>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-6 rounded-xl border border-blue-200 dark:border-blue-700 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <flux:icon.users class="text-blue-600 dark:text-blue-400 size-8 mb-3"/>
                    <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Siswa PKL</p>
                    <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ $allStudents->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 p-6 rounded-xl border border-green-200 dark:border-green-700 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <flux:icon.briefcase class="text-green-600 dark:text-green-400 size-8 mb-3"/>
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">PKL Aktif</p>
                    <p class="text-2xl font-bold text-green-700 dark:text-green-300">{{ $allStudents->where('mulai', '<=', now())->where('selesai', '>=', now())->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 p-6 rounded-xl border border-purple-200 dark:border-purple-700 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <flux:icon.check-circle class="text-purple-600 dark:text-purple-400 size-8 mb-3"/>
                    <p class="text-sm font-medium text-purple-600 dark:text-purple-400">PKL Selesai</p>
                    <p class="text-2xl font-bold text-purple-700 dark:text-purple-300">{{ $allStudents->where('selesai', '<', now())->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 p-6 rounded-xl border border-orange-200 dark:border-orange-700 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <flux:icon.building-office class="text-orange-600 dark:text-orange-400 size-8 mb-3"/>
                    <p class="text-sm font-medium text-orange-600 dark:text-orange-400">Industri Dibimbing</p>
                    <p class="text-2xl font-bold text-orange-700 dark:text-orange-300">{{ $teacher->industries->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    @if($industry)
    <div class="bg-white dark:bg-zinc-900 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700">
        <div class="flex items-center gap-3 mb-6">
            <flux:icon.building-office-2 class="text-cyan-600 dark:text-cyan-400 size-8"/>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Industri yang Dibimbing</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <flux:icon.tag class="text-gray-500 size-5"/>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Nama Industri</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $industry->name }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <flux:icon.briefcase class="text-gray-500 size-5"/>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Bidang Usaha</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $industry->bidang_usaha }}</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <flux:icon.map-pin class="text-gray-500 size-5"/>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Alamat</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $industry->address }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <flux:icon.phone class="text-gray-500 size-5"/>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kontak</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $industry->contact }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($allStudents->count() > 0)
    <div class="bg-white dark:bg-zinc-900 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <flux:icon.academic-cap class="text-cyan-600 dark:text-cyan-400 size-8"/>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Daftar Siswa PKL</h3>
            </div>
            <flux:badge variant="filled" color="cyan">{{ $student->count() }} dari {{ $allStudents->count() }} Siswa</flux:badge>
        </div>
        
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <div class="flex-1">
                <flux:input wire:model.live="search" placeholder="Cari nama siswa, NIS, atau email..." class="w-full">
                    <flux:icon.magnifying-glass slot="leading" class="size-5 text-gray-400"/>
                </flux:input>
            </div>
            <div class="w-full md:w-48">
                <flux:select wire:model.live="statusFilter" placeholder="Filter Status">
                    <flux:select.option value="all">Semua Status</flux:select.option>
                    <flux:select.option value="belum_mulai">Belum Mulai</flux:select.option>
                    <flux:select.option value="aktif">Sedang PKL</flux:select.option>
                    <flux:select.option value="selesai">PKL Selesai</flux:select.option>
                </flux:select>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-zinc-700">
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                            <div class="flex items-center gap-2">
                                <flux:icon.identification class="size-4"/>
                                Siswa
                            </div>
                        </th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                            <div class="flex items-center gap-2">
                                <flux:icon.calendar class="size-4"/>
                                Periode PKL
                            </div>
                        </th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                            <div class="flex items-center gap-2">
                                <flux:icon.clock class="size-4"/>
                                Status
                            </div>
                        </th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                            <div class="flex items-center gap-2">
                                <flux:icon.phone class="size-4"/>
                                Kontak
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                    @forelse($student as $internship)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-800/50 transition-colors">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ substr($internship->student->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $internship->student->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">NIS: {{ $internship->student->nis }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="text-sm">
                                <p class="font-medium text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($internship->mulai)->format('d M Y') }}</p>
                                <p class="text-gray-500 dark:text-gray-400">s/d {{ \Carbon\Carbon::parse($internship->selesai)->format('d M Y') }}</p>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            @php
                                $now = now();
                                $start = \Carbon\Carbon::parse($internship->mulai);
                                $end = \Carbon\Carbon::parse($internship->selesai);
                                
                                if ($now < $start) {
                                    $status = 'Belum Mulai';
                                    $statusColor = 'gray';
                                    $icon = 'clock';
                                } elseif ($now >= $start && $now <= $end) {
                                    $status = 'Sedang PKL';
                                    $statusColor = 'green';
                                    $icon = 'play';
                                } else {
                                    $status = 'Selesai';
                                    $statusColor = 'blue';
                                    $icon = 'check';
                                }
                            @endphp
                            <flux:badge color="{{ $statusColor }}" size="sm">
                                @if($icon === 'clock')
                                    <flux:icon.clock class="size-3 mr-1"/>
                                @elseif($icon === 'play')
                                    <flux:icon.play class="size-3 mr-1"/>
                                @else
                                    <flux:icon.check class="size-3 mr-1"/>
                                @endif
                                {{ $status }}
                            </flux:badge>
                        </td>
                        <td class="py-4 px-4">
                            <div class="text-sm">
                                <p class="text-gray-800 dark:text-gray-100">{{ $internship->student->contact }}</p>
                                <p class="text-gray-500 dark:text-gray-400">{{ $internship->student->email }}</p>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center">
                            <flux:icon.magnifying-glass class="size-12 text-gray-400 mx-auto mb-3"/>
                            <p class="text-gray-500 dark:text-gray-400">Tidak ada siswa yang sesuai dengan pencarian</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="bg-white dark:bg-zinc-900 p-8 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700 text-center">
        <flux:icon.user-group class="size-16 text-gray-400 mx-auto mb-4"/>
        <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Siswa PKL</h3>
        <p class="text-gray-500 dark:text-gray-500">Saat ini belum ada siswa yang mengambil PKL di industri yang Anda bimbing.</p>
    </div>
    @endif

</div>
