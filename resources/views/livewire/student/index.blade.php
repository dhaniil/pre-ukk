<div class="p-6 bg-white dark:bg-zinc-800 rounded-lg shadow-lg">
    <!-- Header & Search/Filter Section -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Siswa</h2>

        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <!-- Search -->
            <div class="relative w-full md:w-64">
                <input
                    wire:model.live="search"
                    type="text"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-zinc-700 rounded-lg focus:outline-none focus:border-primary-500 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100"
                    placeholder="Cari siswa...">
                <div class="absolute left-3 top-2.5">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

            <!-- Filters -->
            <select wire:model.live="statusPKL" class="w-full md:w-48 border border-gray-300 dark:border-zinc-700 rounded-lg px-4 py-2 focus:outline-none focus:border-primary-500 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 shadow-sm">
                <option value="">Status PKL</option>
                <option value="belum">Belum PKL</option>
                <option value="sedang">Sedang PKL</option>
                <option value="selesai">Selesai PKL</option>
            </select>

            <select wire:model.live="gender" class="w-full md:w-48 border border-gray-300 dark:border-zinc-700 rounded-lg px-4 py-2 focus:outline-none focus:border-primary-500 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100">
                <option value="">Gender</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-zinc-700 shadow-md">
        <table class="min-w-full bg-white dark:bg-zinc-900 divide-y divide-gray-200 dark:divide-zinc-700">
            <thead class="bg-gray-50 dark:bg-zinc-800">
                <tr>
                    <th wire:click="sortBy('nis')" class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-700">
                        NIS
                        @if($sortField === 'nis')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th wire:click="sortBy('name')" class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-700">
                        Nama
                        @if($sortField === 'name')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th wire:click="sortBy('gender')" class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-700">
                        Gender
                        @if($sortField === 'gender')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th wire:click="sortBy('status_pkl')" class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-700">
                        Status PKL
                        @if($sortField === 'status_pkl')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th wire:click="sortBy('contact')" class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-700">
                        Contact
                        @if($sortField === 'contact')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th wire:click="sortBy('email')" class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-700">
                        Email
                        @if($sortField === 'email')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                @forelse($students as $student)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $student->nis }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $student->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                            {{ $student->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold shadow-sm
                                {{ $student->status_pkl === 'belum' ? 'bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200' : '' }}
                                {{ $student->status_pkl === 'sedang' ? 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-100' : '' }}
                                {{ $student->status_pkl === 'selesai' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100' : '' }}">
                                {{ ucfirst($student->status_pkl) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $student->contact }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $student->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            <button
                                wire:click="showDetail"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Tidak ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $students->links() }}
    </div>

    <!-- Modal -->
    @if($openModal)
        <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-lg max-w-lg w-full shadow-xl transform transition-all">
                <h1 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-white">Detail Siswa</h1>
                <button
                    wire:click="hideDetail"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    Tutup
                </button>
            </div>
        </div>
    @endif
</div>
