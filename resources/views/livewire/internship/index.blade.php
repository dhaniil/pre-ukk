<div class="min-h-screen space-y-6">
    <div  id="heading" class="border border-blue-100 rounded-2xl p-4">
        <div class="flex gap-4 items-center">
            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl p-2 border border-blue-100 ">
                <flux:icon.graduation-cap class="text-white size-8" />
            </div>
            <div>
                <h2 class="font-bold text-xl lg:text-3xl">My Internship</h2>
                <p class="text-gray-600 font-light">Dashboard PKL Siswa</p>
            </div>
        </div>
    </div>

    <div  id="student-info" class="flex flex-col gap-6 border border-blue-100 rounded-2xl p-4">
        <div class="flex gap-4 items-center">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-2 border border-blue-100">
                <flux:icon.user class="text-white size-8" />
            </div>
            <h3 class="font-semibold text-xl md:text-3xl">Student Information</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-4 rounded-xl border border-cyan-200">
                <div class="flex items-center gap-3 mb-2">
                    <flux:icon.user class="text-cyan-600 size-6"/>
                    <span class="font-semibold text-cyan-800">Nama Siswa</span>
                </div>
                <p class="text-lg font-bold text-cyan-900">{{ auth()->user()->name }}</p>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-4 rounded-xl border border-cyan-200">
                <div class="flex items-center gap-3 mb-2">
                    <flux:icon.envelope class="text-cyan-600 size-6"/>
                    <span class="font-semibold text-cyan-800">Email</span>
                </div>
                <p class="text-lg font-bold text-cyan-900">{{ auth()->user()->email }}</p>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-4 rounded-xl border border-cyan-200">
                <div class="flex items-center gap-3 mb-2">
                    <flux:icon.identification class="text-cyan-600 size-6"/>
                    <span class="font-semibold text-cyan-800">NIS</span>
                </div>
                <p class="text-lg font-bold text-cyan-900">{{ $student->nis }}</p>
            </div>
        </div>
    </div>

    @if ($internships)
        <div data-aos="fade-up" data-aos-duration="800" class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Industry Information Section -->
            <div id="internship-info" class="flex flex-col gap-6 border border-blue-100 rounded-2xl p-6">
                <div class="flex gap-4 items-center">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-2 border border-blue-100">
                        <flux:icon.building-office class="text-white size-8" />
                    </div>
                    <h3 class="font-semibold text-xl md:text-2xl">Industry Information</h3>
                </div>

                <div class="space-y-4">
                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.building-office class="text-teal-600 size-6"/>
                            <span class="font-semibold text-teal-800">Nama Industri</span>
                        </div>
                        <p class="text-lg font-bold text-teal-900">{{ $internships->industries->name }}</p>
                    </div>

                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.briefcase class="text-cyan-600 size-6"/>
                            <span class="font-semibold text-cyan-800">Bidang Usaha</span>
                        </div>
                        <p class="text-sm font-medium text-cyan-900">{{ $internships->industries->bidang_usaha }}</p>
                    </div>

                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.map-pin class="text-cyan-600 size-6"/>
                            <span class="font-semibold text-cyan-800">Alamat</span>
                        </div>
                        <p class="text-sm font-medium text-cyan-900">{{ $internships->industries->address }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-xl borderhover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.phone class="text-cyan-600 size-6"/>
                                <span class="font-semibold text-cyan-800">Kontak</span>
                            </div>
                            <p class="text-sm font-bold text-cyan-900">{{ $internships->industries->contact }}</p>
                        </div>

                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.envelope class="text-cyan-600 size-6"/>
                                <span class="font-semibold text-cyan-800">Email</span>
                            </div>
                            <p class="text-sm font-bold text-teal-900">{{ $internships->industries->email }}</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 mb-2">
                            <flux:icon.user-circle class="text-cyan-600 size-6"/>
                            <span class="font-semibold text-cyan-800">Guru Pembimbing</span>
                        </div>
                        <p class="text-lg font-bold text-cyan-900">{{ $internships->teacher->name }}</p>
                    </div>
                </div>
            </div>

            <div id="duration-info" class="flex flex-col gap-6 border border-blue-100 rounded-2xl p-6">
                <div class="flex gap-4 items-center">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-2 border border-blue-100">
                        <flux:icon.calendar class="text-white size-8" />
                    </div>
                    <h3 class="font-semibold text-xl md:text-2xl">Internship Period</h3>
                </div>

                <div class="space-y-4">
                    <div class="space-y-4">
                        <div class=" p-4 rounded-xl hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.play class="text-green-600 size-6"/>
                                <span class="font-semibold text-green-800">Tanggal Mulai</span>
                            </div>
                            <p class="text-lg font-bold text-green-900">
                                {{ \Carbon\Carbon::parse($internships->mulai)->format('d F Y') }}
                            </p>
                            <p class="text-sm text-green-700 mt-1">
                                {{ \Carbon\Carbon::parse($internships->mulai)->diffForHumans() }}
                            </p>
                        </div>

                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.stop class="text-red-600 size-6"/>
                                <span class="font-semibold text-red-800">Tanggal Selesai</span>
                            </div>
                            <p class="text-lg font-bold text-red-900">
                                {{ \Carbon\Carbon::parse($internships->selesai)->format('d F Y') }}
                            </p>
                            <p class="text-sm text-red-700 mt-1">
                                {{ \Carbon\Carbon::parse($internships->selesai)->diffForHumans() }}
                            </p>
                        </div>

                        <div class="p-4 rounded-xl hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <flux:icon.clock class="text-blue-600 size-6"/>
                                <span class="font-semibold text-blue-800">Durasi PKL</span>
                            </div>
                            @php
                                $start = \Carbon\Carbon::parse($internships->mulai);
                                $end = \Carbon\Carbon::parse($internships->selesai);
                                $duration = $start->diffInDays($end);
                                $weeks = floor($duration / 7);
                                $days = $duration % 7;
                            @endphp
                            <p class="text-lg font-bold text-blue-900">
                                {{ $duration }} hari
                            </p>
                            <p class="text-sm text-blue-700 mt-1">
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
                        <div class="bg-gradient-to-br from-{{ $statusColor }}-50 to-{{ $statusColor }}-100 p-4 rounded-xl hover:shadow-md transition-shadow flex gap-4 items-center">
                            <div class="bg-{{$statusColor}}-500 rounded-xl p-2 ">
                                <flux:icon.bell class="size-8 text-white/80" />
                            </div>

                            <p class="text-lg font-bold text-{{ $statusColor }}-900">{{ $status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="p-8 rounded-2xl text-center">
            <flux:icon.building-office class="size-16 text-gray-400 mx-auto mb-4"/>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data Laporan PKL</h3>
            <p class="text-gray-500 mb-6">Anda belum membuat laporan PKL anda</p>
            <flux:button variant="primary" wire:click="openReportModal" icon="plus" class="bg-gradient-to-br from-cyan-500 to-cyan-600 ">
                Lapor PKL
            </flux:button>
        </div>
    @endif

    @if($showReportModal)
    <livewire:report-internship />
    @endif
</div>
