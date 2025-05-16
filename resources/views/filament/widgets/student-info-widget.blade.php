<x-filament-widgets::widget>
    <x-filament::section>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <h3 class="font-medium text-gray-500">Nama</h3>
                <p class="mt-1">{{ $student?->name ?? '-' }}</p>
            </div>
            <div>
                <h3 class="font-medium text-gray-500">NIS</h3>
                <p class="mt-1">{{ $student?->nis ?? '-' }}</p>
            </div>
            <div>
                <h3 class="font-medium text-gray-500">Status PKL</h3>
                <p class="mt-1">
                    @if($student?->status_pkl === 'Aktif')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success-100 text-success-800">
                            {{ $student->status_pkl }}
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-danger-100 text-danger-800">
                            {{ $student?->status_pkl ?? 'Tidak Aktif' }}
                        </span>
                    @endif
                </p>
            </div>
        </div>

        @if($student?->status_pkl === 'Aktif' && $internship)
            <div class="mt-4 grid grid-cols-2 gap-4">
                <div>
                    <h3 class="font-medium text-gray-500">Industri</h3>
                    <p class="mt-1">{{ $internship->industries?->name ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-500">Guru Pembimbing</h3>
                    <p class="mt-1">{{ $internship->teacher?->name ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-500">Tanggal Mulai</h3>
                    <p class="mt-1">{{ $internship->mulai ? \Carbon\Carbon::parse($internship->mulai)->format('d F Y') : '-' }}</p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-500">Tanggal Selesai</h3>
                    <p class="mt-1">{{ $internship->selesai ? \Carbon\Carbon::parse($internship->selesai)->format('d F Y') : '-' }}</p>
                </div>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
