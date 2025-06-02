<div class="min-h-screen space-y-6">
    <div  id="heading" class="border border-blue-100 dark:border-zinc-700/60 rounded-2xl p-4 bg-white dark:bg-zinc-900">
        <div class="flex gap-4 items-center">
            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 dark:from-cyan-700 dark:to-cyan-800 rounded-xl p-2 border border-blue-100 dark:border-zinc-800/60 ">
                <flux:icon.graduation-cap class="text-white size-8" />
            </div>
            <div>
                <h2 class="font-bold text-xl lg:text-3xl text-gray-900 dark:text-white">My Internship</h2>
                <p class="text-gray-600 dark:text-gray-400 font-light">Dashboard PKL Siswa</p>
            </div>
        </div>
    </div>

    <div  id="student-info" class="flex flex-col gap-6 border border-blue-100 dark:border-zinc-700/60 rounded-2xl p-4 bg-white dark:bg-zinc-900">
        <div class="flex gap-4 items-center">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 dark:from-blue-700 dark:to-blue-800 rounded-xl p-2 border border-blue-100 dark:border-zinc-800/60">
                <flux:icon.user class="text-white size-8" />
            </div>
            <h3 class="font-semibold text-xl md:text-3xl text-gray-900 dark:text-white">Student Information</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20 p-4 rounded-xl border border-cyan-200 dark:border-zinc-800/60">
                <div class="flex items-center gap-3 mb-2">
                    <flux:icon.user class="text-cyan-600 dark:text-cyan-400 size-6"/>
                    <span class="font-semibold text-cyan-800 dark:text-cyan-300">Nama Siswa</span>
                </div>
                <p class="text-lg font-bold text-cyan-900 dark:text-cyan-100">{{ auth()->user()->name }}</p>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20 p-4 rounded-xl border border-cyan-200 dark:border-zinc-800/60">
                <div class="flex items-center gap-3 mb-2">
                    <flux:icon.envelope class="text-cyan-600 dark:text-cyan-400 size-6"/>
                    <span class="font-semibold text-cyan-800 dark:text-cyan-300">Email</span>
                </div>
                <p class="text-lg font-bold text-cyan-900 dark:text-cyan-100">{{ auth()->user()->email }}</p>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20 p-4 rounded-xl border border-cyan-200 dark:border-zinc-800/60">
                <div class="flex items-center gap-3 mb-2">
                    <flux:icon.identification class="text-cyan-600 dark:text-cyan-400 size-6"/>
                    <span class="font-semibold text-cyan-800 dark:text-cyan-300">NIS</span>
                </div>
                <p class="text-lg font-bold text-cyan-900 dark:text-cyan-100">{{ $student->nis }}</p>
            </div>
        </div>
    </div>

    @if ($internships)
        <div  class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Industry Information Section -->
            <div id="internship-info" class="flex flex-col gap-6 border border-blue-100 dark:border-zinc-700/60 rounded-2xl p-6 bg-white dark:bg-zinc-900">
                <div class="flex gap-4 items-center">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 dark:from-green-700 dark:to-green-800 rounded-xl p-2 border border-blue-100 dark:border-zinc-800/60">
                        <flux:icon.building-office class="text-white size-8" />
                    </div>
                    <h3 class="font-semibold text-xl md:text-2xl text-gray-900 dark:text-white">Industry Information</h3>
                </div>

                <div class="space-y-4">
                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.building-office class="text-teal-600 dark:text-teal-300 size-6"/>
                            <span class="font-semibold text-teal-800 dark:text-teal-300">Nama Industri</span>
                        </div>
                        <p class="text-lg font-bold text-teal-900 dark:text-teal-100">{{ $internships->industries->name }}</p>
                    </div>

                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.briefcase class="text-cyan-600 dark:text-cyan-400 size-6"/>
                            <span class="font-semibold text-cyan-800 dark:text-cyan-300">Bidang Usaha</span>
                        </div>
                        <p class="text-sm font-medium text-cyan-900 dark:text-cyan-100">{{ $internships->industries->bidang_usaha }}</p>
                    </div>

                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.map-pin class="text-cyan-600 dark:text-cyan-400 size-6"/>
                            <span class="font-semibold text-cyan-800 dark:text-cyan-300">Alamat</span>
                        </div>
                        <p class="text-sm font-medium text-cyan-900 dark:text-cyan-100">{{ $internships->industries->address }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.phone class="text-cyan-600 dark:text-cyan-400 size-6"/>
                                <span class="font-semibold text-cyan-800 dark:text-cyan-300">Kontak</span>
                            </div>
                            <p class="text-sm font-bold text-cyan-900 dark:text-cyan-100">{{ $internships->industries->contact }}</p>
                        </div>

                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.envelope class="text-cyan-600 dark:text-cyan-400 size-6"/>
                                <span class="font-semibold text-cyan-800 dark:text-cyan-300">Email</span>
                            </div>
                            <p class="text-sm font-bold text-teal-900 dark:text-teal-100">{{ $internships->industries->email }}</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.user-circle class="text-cyan-600 dark:text-cyan-400 size-6"/>
                            <span class="font-semibold text-cyan-800 dark:text-cyan-300">Guru Pembimbing</span>
                        </div>
                        <p class="text-lg font-bold text-cyan-900 dark:text-cyan-100">{{ $internships->teacher->name }}</p>
                    </div>
                </div>
            </div>

            <div id="duration-info" class="flex flex-col gap-6 border border-blue-100 dark:border-zinc-700/60 rounded-2xl p-6 bg-white dark:bg-zinc-900">
                <div class="flex gap-4 items-center">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 dark:from-blue-700 dark:to-blue-800 rounded-xl p-2 border border-blue-100 dark:border-zinc-800/60">
                        <flux:icon.calendar class="text-white size-8" />
                    </div>
                    <h3 class="font-semibold text-xl md:text-2xl text-gray-900 dark:text-white">Internship Period</h3>
                </div>

                <div class="space-y-4">
                    <div class="space-y-4">
                        <div class=" p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.play class="text-green-600 dark:text-green-400 size-6"/>
                                <span class="font-semibold text-green-800 dark:text-green-300">Tanggal Mulai</span>
                            </div>
                            <p class="text-lg font-bold text-green-900 dark:text-green-100">
                                {{ \Carbon\Carbon::parse($internships->mulai)->format('d F Y') }}
                            </p>
                            <p class="text-sm text-green-700 dark:text-green-300 mt-1">
                                {{ \Carbon\Carbon::parse($internships->mulai)->diffForHumans() }}
                            </p>
                        </div>

                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.stop class="text-red-600 dark:text-red-400 size-6"/>
                                <span class="font-semibold text-red-800 dark:text-red-300">Tanggal Selesai</span>
                            </div>
                            <p class="text-lg font-bold text-red-900 dark:text-red-100">
                                {{ \Carbon\Carbon::parse($internships->selesai)->format('d F Y') }}
                            </p>
                            <p class="text-sm text-red-700 dark:text-red-300 mt-1">
                                {{ \Carbon\Carbon::parse($internships->selesai)->diffForHumans() }}
                            </p>
                        </div>

                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow bg-white dark:bg-zinc-900">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.clock class="text-blue-600 dark:text-blue-400 size-6"/>
                                <span class="font-semibold text-blue-800 dark:text-blue-300">Durasi PKL</span>
                            </div>
                            @php
                                $start = \Carbon\Carbon::parse($internships->mulai);
                                $end = \Carbon\Carbon::parse($internships->selesai);
                                $duration = $start->diffInDays($end);
                                $weeks = floor($duration / 7);
                                $days = $duration % 7;
                            @endphp
                            <p class="text-lg font-bold text-blue-900 dark:text-blue-100">
                                {{ $duration }} hari
                            </p>
                            <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">
                                {{ $weeks }} minggu {{ $days }} hari
                            </p>
                        </div>

                        @php
                            $now = now();
                            $start = \Carbon\Carbon::parse($internships->mulai);
                            $end = \Carbon\Carbon::parse($internships->selesai);

                            if ($now < $start) {
                                $status = 'Belum Mulai';
                                $statusColor = 'yellow';
                                $icon = 'clock';
                            } elseif ($now >= $start && $now <= $end) {
                                $status = 'Sedang PKL';
                                $statusColor = 'green';
                                $icon = 'play';
                            } else {
                                $status = 'Selesai';
                                $statusColor = 'blue';
                                $icon = 'check-circle';
                            }
                        @endphp
                        <div class="bg-gradient-to-br from-{{ $statusColor }}-50 to-{{ $statusColor }}-100 dark:from-{{ $statusColor }}-900/20 dark:to-{{ $statusColor }}-800/20 p-4 rounded-xl hover:shadow-md transition-shadow flex gap-4 items-center">
                            <div class="bg-{{$statusColor}}-500 dark:bg-{{$statusColor}}-700 rounded-xl p-2 ">
                                <flux:icon.bell class="size-8 text-white/80" />
                            </div>

                            <p class="text-lg font-bold text-{{ $statusColor }}-900 dark:text-{{ $statusColor }}-100">{{ $status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="p-8 rounded-2xl text-center bg-white dark:bg-zinc-900 border border-blue-100 dark:border-zinc-700/60">
            <flux:icon.building-office class="size-16 text-gray-400 mx-auto mb-4"/>
            <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Data Laporan PKL</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Anda belum membuat laporan PKL anda</p>
            <flux:button variant="primary" wire:click="openReportModal" icon="plus" class="bg-gradient-to-br from-cyan-500 to-cyan-600 ">
                Lapor PKL
            </flux:button>
        </div>
    @endif

    @if($showReportModal)
    <livewire:report-internship />
    @endif
</div>
