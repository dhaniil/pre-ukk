<div class="min-h-screen space-y-6">
    <!-- Custom Pagination Styles -->
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin: 0;
        }
        
        .pagination .page-link {
            padding: 0.75rem 1rem;
            border: 1px solid #dbeafe;
            border-radius: 0.5rem;
            background: white;
            color: #4b5563;
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
        }
        
        .pagination .page-link:hover {
            background: #f0f9ff;
            border-color: #06b6d4;
            color: #0891b2;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        
        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            border-color: #06b6d4;
            color: white;
            box-shadow: 0 4px 6px -1px rgb(6 182 212 / 0.3);
        }
        
        .pagination .page-item.disabled .page-link {
            background: #f9fafb;
            border-color: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }
        
        .pagination .page-item.disabled .page-link:hover {
            background: #f9fafb;
            border-color: #e5e7eb;
            color: #9ca3af;
            box-shadow: none;
        }
    </style>

    <div id="heading" class="flex gap-4 items-center rounded-2xl border border-blue-100 hover:shadow-md p-4 transition-all duration-300">
        <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl p-2">
            <flux:icon.factory class="size-8 text-white" />
        </div>
        <div class="flex flex-col">
            <h2 class="text-xl md:text-2xl font-bold ">Daftar Industri</h2>
            <description class="text-gray-600 font-light">Cocominto, Yori mo anata</description>
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <!-- Search Input -->
        <div class="flex-1 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                <flux:icon.magnifying-glass class="h-4 w-4 text-gray-400" />
            </div>
            <input
                wire:model.live.300ms="search"
                type="text"
                class="w-full pl-10 pr-4 py-3 rounded-lg border border-blue-100 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent shadow-sm hover:shadow-md transition-all duration-200"
                placeholder="Cari nama industri, bidang usaha..."
            >
        </div>

        <!-- Filters Container -->
        <div class="flex flex-wrap gap-3 items-center">
            <!-- Filter Bidang Usaha -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                    <flux:icon.funnel class="h-4 w-4 text-gray-400" />
                </div>
                <select
                    wire:model.live="bidang_usaha"
                    class="min-w-52 pl-10 pr-8 py-3 rounded-lg border border-blue-100 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent shadow-sm hover:shadow-md transition-all duration-200 appearance-none cursor-pointer">
                    <option value="">Semua Bidang</option>
                    @foreach($optionBidangUsaha as $option)
                        <option value="{{ html_entity_decode($option) }}">{{ $option }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <flux:icon.chevron-down class="h-4 w-4 text-gray-400" />
                </div>
            </div>

            <!-- Items Per Page -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                    <flux:icon.rectangle-stack class="h-4 w-4 text-gray-400" />
                </div>
                <select
                    wire:model.live="perPage"
                    class="min-w-40 pl-10 pr-8 py-3 rounded-lg border border-blue-100 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent shadow-sm hover:shadow-md transition-all duration-200 appearance-none cursor-pointer">
                    <option value="5">5 per halaman</option>
                    <option value="10">10 per halaman</option>
                    <option value="15">15 per halaman</option>
                    <option value="25">25 per halaman</option>
                    <option value="50">50 per halaman</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <flux:icon.chevron-down class="h-4 w-4 text-gray-400" />
                </div>
            </div>

            <!-- Reset Button -->
            @if($search || $bidang_usaha)
                <button 
                    wire:click="resetFilter"
                    class="px-4 py-3 bg-white border border-blue-100 text-gray-700 rounded-lg shadow-sm hover:shadow-md hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 flex items-center gap-2 font-medium"
                    title="Reset Filter">
                    <flux:icon.x-mark class="size-4" />
                    <span>Reset</span>
                </button>
            @endif
        </div>
    </div>

    <!-- Results Info -->
    <div wire:loading.remove class="bg-white rounded-2xl border border-blue-100 shadow-sm p-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 text-sm text-gray-600">
            <div class="flex flex-wrap items-center gap-3">
                <div class="flex items-center gap-2">
                    <flux:icon.document-text class="size-4 text-cyan-600" />
                    <span class="font-medium">Menampilkan {{ $industries->count() }} dari {{ $industries->total() }} industri</span>
                </div>
                @if($search)
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium flex items-center gap-1">
                        <flux:icon.magnifying-glass class="size-3" />
                        "{{ $search }}"
                    </span>
                @endif
                @if($bidang_usaha)
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium flex items-center gap-1">
                        <flux:icon.tag class="size-3" />
                        {{ $bidang_usaha }}
                    </span>
                @endif
            </div>
            @if($industries->hasPages())
                <div class="flex items-center gap-2 text-gray-500">
                    <flux:icon.document-duplicate class="size-4" />
                    <span class="font-medium">Halaman {{ $industries->currentPage() }} dari {{ $industries->lastPage() }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="space-y-4">
        <!-- Loading State - Skeleton -->
        <div wire:loading.flex class="flex flex-col space-y-4">
            @for ($i = 0; $i < 5; $i++)
                <div class="p-6 border border-blue-100 rounded-2xl bg-white shadow-sm animate-pulse">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-xl"></div>
                            <div class="space-y-2">
                                <div class="h-6 bg-gray-300 rounded w-48"></div>
                                <div class="h-4 bg-gray-200 rounded w-32"></div>
                            </div>
                        </div>
                        <div class="h-8 bg-gray-200 rounded w-24"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-full"></div>
                            <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                        </div>
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-full"></div>
                            <div class="h-4 bg-gray-200 rounded w-2/3"></div>
                        </div>
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-full"></div>
                            <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <!-- Content List -->
        <div wire:loading.remove class="space-y-4">
            @forelse ($industries as $industry)
                <div class="p-6 border border-blue-100 rounded-2xl bg-white shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl p-3">
                                <flux:icon.factory class="size-6 text-white" />
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">{{ $industry->name }}</h3>
                                <p class="text-gray-600 flex items-center gap-2">
                                    <flux:icon.user class="size-4" />
                                    {{ $industry->teacher->name }}
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 bg-cyan-100 text-cyan-800 text-sm font-medium rounded-full">
                                Industri
                            </span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Bidang Usaha -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-gray-700">
                                <flux:icon.cable class="size-4 text-cyan-600" />
                                <span class="font-medium">Bidang Usaha</span>
                            </div>
                            <p class="text-gray-600 ml-6" title="{{ $industry->bidang_usaha }}">
                                {{ $industry->bidang_usaha }}
                            </p>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-gray-700">
                                <flux:icon.mail class="size-4 text-cyan-600" />
                                <span class="font-medium">Kontak</span>
                            </div>
                            <div class="ml-6 space-y-1">
                                <p class="text-gray-600">{{ $industry->email }}</p>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray-600">{{ $industry->contact }}</span>
                                    <button onclick="navigator.clipboard.writeText('{{ $industry->contact }}')"
                                            class="p-1 hover:bg-cyan-100 rounded transition-colors text-cyan-600"
                                            title="Copy contact">
                                        <flux:icon.clipboard class="size-3" />
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Address -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-gray-700">
                                <flux:icon.map class="size-4 text-cyan-600" />
                                <span class="font-medium">Alamat</span>
                            </div>
                            <p class="text-gray-600 ml-6" title="{{ $industry->address }}">
                                {{ $industry->address }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                            <flux:icon.factory class="size-8 text-gray-400" />
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-lg font-medium text-gray-900">Tidak ada industri ditemukan</h3>
                            <p class="text-gray-600">Coba ubah kata kunci pencarian atau filter yang digunakan.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div wire:loading.remove class="mt-8 flex justify-center">
            <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-4 w-full">
                {{ $industries->links() }}
            </div>
        </div>
    </div>
</div>
