{{-- resources/views/livewire/luxury-animations.blade.php --}}
<div class="luxury-page overflow-x-hidden bg-gray-900 text-white min-h-screen">
    {{-- Parallax Gradient Hero Section --}}
    <x-parallax-section height="100vh" colors="from-indigo-900 via-purple-800 to-pink-700">
        <div class="container mx-auto px-6 text-center">
            <x-text-reveal tag="h1" class="text-7xl font-extrabold mb-6 tracking-tight">
                Pengalaman Visual Mewah
            </x-text-reveal>
            
            <x-text-reveal delay="0.5" duration="1.5" stagger="0.08" from="bottom" class="text-2xl max-w-3xl mx-auto mb-10 opacity-90 leading-relaxed">
                Eksplorasi efek animasi terbaik untuk menghadirkan sentuhan eksklusif pada pengalaman digital Anda
            </x-text-reveal>
            
            <x-floating-element class="inline-block mt-8">
                <button class="px-10 py-4 bg-white text-purple-900 rounded-full font-bold text-lg tracking-wide transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300 focus:ring-opacity-50 shadow-xl">
                    Mulai Eksplorasi
                </button>
            </x-floating-element>
        </div>
    </x-parallax-section>

    {{-- Text Animation Section --}}
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-purple-900 to-indigo-900 opacity-30"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <x-text-reveal class="text-4xl md:text-5xl font-bold text-center mb-16 tracking-tight">
                Transformasikan <span class="text-pink-400">Konten Anda</span> Menjadi Pengalaman Yang Tak Terlupakan
            </x-text-reveal>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                <div class="relative z-10">
                    <x-floating-element delay="0.2" amplitude="10" class="bg-gradient-to-br from-indigo-800 to-purple-700 rounded-2xl p-6 shadow-xl">
                        <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-pink-500 flex items-center justify-center text-2xl font-bold">01</div>
                        <h3 class="text-2xl font-bold mb-4 mt-4">Kesempurnaan Visual</h3>
                        <p class="text-indigo-100 opacity-90">Setiap elemen dirancang dengan presisi untuk menciptakan kesan mewah dan profesional.</p>
                    </x-floating-element>
                </div>
                
                <div class="relative z-10">
                    <x-floating-element delay="0.4" amplitude="12" class="bg-gradient-to-br from-purple-800 to-pink-700 rounded-2xl p-6 shadow-xl">
                        <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-indigo-500 flex items-center justify-center text-2xl font-bold">02</div>
                        <h3 class="text-2xl font-bold mb-4 mt-4">Animasi Effortless</h3>
                        <p class="text-indigo-100 opacity-90">Efek transisi halus yang meningkatkan storytelling dan pengalaman pengguna.</p>
                    </x-floating-element>
                </div>
                
                <div class="relative z-10">
                    <x-floating-element delay="0.6" amplitude="14" class="bg-gradient-to-br from-pink-800 to-indigo-700 rounded-2xl p-6 shadow-xl">
                        <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-purple-500 flex items-center justify-center text-2xl font-bold">03</div>
                        <h3 class="text-2xl font-bold mb-4 mt-4">Performa Optimal</h3>
                        <p class="text-indigo-100 opacity-90">Dikembangkan dengan memperhatikan performa untuk pengalaman yang mulus di semua perangkat.</p>
                    </x-floating-element>
                </div>
            </div>
        </div>
        
        <div class="absolute left-0 right-0 bottom-0 h-32 bg-gradient-to-t from-gray-900 to-transparent"></div>
    </section>

    {{-- Staggered Feature Cards Section --}}
    <section class="py-32 relative">
        <div class="container mx-auto px-6">
            <x-text-reveal from="left" class="text-4xl md:text-5xl font-bold mb-20 tracking-tight">
                Fitur <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400">Premium</span>
            </x-text-reveal>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="p-1 bg-gradient-to-br from-pink-500 to-indigo-600 rounded-2xl">
                    <div class="bg-gray-900 rounded-2xl p-8 h-full">
                        <x-floating-element amplitude="8" rotation="3" class="inline-block mb-6 text-4xl">
                            ✨
                        </x-floating-element>
                        <x-text-reveal tag="h3" from="right" stagger="0.03" class="text-2xl font-bold mb-4">
                            Parallax Scrolling Effect
                        </x-text-reveal>
                        <p class="text-gray-300">Kedalaman visual yang meningkatkan pengalaman scroll dengan elemen bergerak pada kecepatan berbeda.</p>
                    </div>
                </div>
                
                <div class="p-1 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl">
                    <div class="bg-gray-900 rounded-2xl p-8 h-full">
                        <x-floating-element amplitude="8" rotation="3" class="inline-block mb-6 text-4xl">
                            🌟
                        </x-floating-element>
                        <x-text-reveal tag="h3" from="right" stagger="0.03" class="text-2xl font-bold mb-4">
                            Text Reveal Animation
                        </x-text-reveal>
                        <p class="text-gray-300">Ungkapkan pesan Anda dengan gaya menggunakan animasi teks yang canggih saat pengguna menggulir.</p>
                    </div>
                </div>
                
                <div class="p-1 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl">
                    <div class="bg-gray-900 rounded-2xl p-8 h-full">
                        <x-floating-element amplitude="8" rotation="3" class="inline-block mb-6 text-4xl">
                            💎
                        </x-floating-element>
                        <x-text-reveal tag="h3" from="right" stagger="0.03" class="text-2xl font-bold mb-4">
                            Floating Elements
                        </x-text-reveal>
                        <p class="text-gray-300">Berikan dimensi dan karakter pada elemen penting dengan efek melayang yang elegan.</p>
                    </div>
                </div>
                
                <div class="p-1 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl">
                    <div class="bg-gray-900 rounded-2xl p-8 h-full">
                        <x-floating-element amplitude="8" rotation="3" class="inline-block mb-6 text-4xl">
                            🔮
                        </x-floating-element>
                        <x-text-reveal tag="h3" from="right" stagger="0.03" class="text-2xl font-bold mb-4">
                            Customizable Properties
                        </x-text-reveal>
                        <p class="text-gray-300">Sesuaikan setiap aspek animasi untuk menciptakan pengalaman yang unik sesuai brand Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>    {{-- Final CTA Section --}}
    <section class="py-20 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto p-1 bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 rounded-2xl">
                <div class="bg-gray-900 rounded-2xl p-10 text-center">
                    <x-text-reveal class="text-3xl md:text-4xl font-bold mb-6">
                        Siap Menerapkan Animasi Mewah Ini?
                    </x-text-reveal>
                    
                    <x-text-reveal delay="0.3" class="text-lg text-gray-300 mb-8">
                        Bawa pengalaman digital Anda ke level berikutnya dengan komponen animasi premium
                    </x-text-reveal>
                    
                    <x-floating-element amplitude="10" class="inline-block">
                        <button class="px-10 py-4 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full font-bold text-lg tracking-wide shadow-lg transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-500 focus:ring-opacity-50">
                            Mulai Sekarang
                        </button>
                    </x-floating-element>
                </div>
            </div>
        </div>
    </section>
      {{-- Deep Parallax Gallery Section --}}
    <section class="py-32 relative overflow-hidden" style="perspective: 1000px;">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900 to-indigo-900 opacity-90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <x-text-reveal class="text-4xl md:text-5xl font-bold text-center mb-16 tracking-tight" data-depth-scroll="0.2">
                Dimensi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Parallax Mendalam</span>
            </x-text-reveal>
            
            <div class="deep-parallax-scene mt-20 mb-28 relative" style="height: 80vh;">
                <!-- Layer Dasar (paling jauh) -->
                <div class="deep-parallax-layer absolute inset-0 w-full h-full flex items-center justify-center" data-depth="0.9">
                    <div class="w-full h-full bg-gradient-to-br from-indigo-900/30 to-purple-900/30 rounded-3xl transform scale-90"></div>
                </div>
                
                <!-- Layer Tengah 1 -->
                <div class="deep-parallax-layer absolute inset-0 w-full h-full flex items-center justify-center" data-depth="0.7">
                    <div class="w-[90%] h-[90%] bg-gradient-to-br from-indigo-800/40 to-purple-800/40 rounded-3xl transform scale-95"></div>
                </div>
                
                <!-- Layer Tengah 2 -->
                <div class="deep-parallax-layer absolute inset-0 w-full h-full flex items-center justify-center" data-depth="0.5">
                    <div class="w-[80%] h-[80%] bg-gradient-to-br from-indigo-700/50 to-purple-700/50 rounded-3xl transform scale-95 flex items-center justify-center">
                        <div class="text-white text-opacity-20 text-[120px] font-extrabold">DEPTH</div>
                    </div>
                </div>
                
                <!-- Layer Tengah 3 -->
                <div class="deep-parallax-layer absolute inset-0 w-full h-full flex items-center justify-center" data-depth="0.3">
                    <div class="w-[70%] h-[70%] bg-gradient-to-br from-indigo-600/60 to-purple-600/60 rounded-3xl transform scale-95"></div>
                </div>
                
                <!-- Layer Atas (paling dekat) -->
                <div class="deep-parallax-layer absolute inset-0 w-full h-full flex items-center justify-center" data-depth="0.1">
                    <div class="w-[60%] h-[60%] bg-gradient-to-br from-pink-500/70 to-purple-500/70 rounded-3xl shadow-2xl flex flex-col items-center justify-center p-8">
                        <span class="text-8xl mb-6">✨</span>
                        <h3 class="text-2xl md:text-3xl font-bold mb-4 text-center">Efek Kedalaman</h3>
                        <p class="text-center text-white/80 max-w-md">Scroll untuk merasakan dimensi yang seolah-olah menarik Anda ke dalam dunia visual yang dramatis.</p>
                    </div>
                </div>
                
                <!-- Elemen Melayang Samping -->
                <div class="absolute top-1/4 left-0 md:left-10" data-depth="0.15">
                    <div class="w-16 h-16 md:w-24 md:h-24 rounded-full bg-gradient-to-br from-pink-500 to-purple-600 opacity-80 shadow-lg flex items-center justify-center">
                        <span class="text-3xl">🌠</span>
                    </div>
                </div>
                
                <div class="absolute top-2/3 right-0 md:right-10" data-depth="0.2">
                    <div class="w-20 h-20 md:w-32 md:h-32 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 opacity-80 shadow-lg flex items-center justify-center">
                        <span class="text-4xl">🔮</span>
                    </div>
                </div>
                
                <div class="absolute top-1/2 left-10 md:left-20" data-depth="0.25">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 opacity-80 shadow-lg flex items-center justify-center">
                        <span class="text-2xl">💫</span>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <x-text-reveal class="text-lg text-gray-300">
                    Efek parallax mendalam menciptakan ilusi kedalaman yang dramatis saat pengguna scroll halaman
                </x-text-reveal>
            </div>
        </div>
    </section>
    
    {{-- NEW: 3D Tilt Card Premium Section --}}
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-indigo-900 to-purple-900 opacity-30"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <x-text-reveal class="text-4xl md:text-5xl font-bold text-center mb-16 tracking-tight">
                Efek <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-indigo-400">3D Tilt Premium</span>
            </x-text-reveal>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <x-tilt-card max="15" scale="1.05" glareMax="0.2" class="bg-gradient-to-br from-pink-500 to-purple-600 p-1 rounded-xl shadow-2xl">
                    <div class="bg-gray-900 p-8 rounded-xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-purple-500 flex items-center justify-center text-xl">
                                💳
                            </div>
                            <h3 class="text-xl font-bold ml-4">Paket Premium</h3>
                        </div>
                        <p class="mb-6 text-gray-300">Akses penuh ke semua fitur premium dan dukungan prioritas.</p>
                        <div class="text-2xl font-bold mb-2">Rp 599.000</div>
                        <div class="text-sm text-pink-400 mb-6">per tahun</div>
                        <button class="w-full py-3 bg-gradient-to-r from-pink-500 to-purple-600 rounded-lg font-bold">
                            Pilih Paket
                        </button>
                    </div>
                </x-tilt-card>
                
                <x-tilt-card max="15" scale="1.05" glareMax="0.2" class="bg-gradient-to-br from-indigo-500 to-purple-600 p-1 rounded-xl shadow-2xl">
                    <div class="bg-gray-900 p-8 rounded-xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center text-xl">
                                ⚡
                            </div>
                            <h3 class="text-xl font-bold ml-4">Paket Pro</h3>
                        </div>
                        <p class="mb-6 text-gray-300">Solusi terbaik untuk tim profesional dengan kebutuhan tinggi.</p>
                        <div class="text-2xl font-bold mb-2">Rp 999.000</div>
                        <div class="text-sm text-indigo-400 mb-6">per tahun</div>
                        <button class="w-full py-3 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg font-bold">
                            Pilih Paket
                        </button>
                    </div>
                </x-tilt-card>
                
                <x-tilt-card max="15" scale="1.05" glareMax="0.2" class="bg-gradient-to-br from-blue-500 to-indigo-600 p-1 rounded-xl shadow-2xl">
                    <div class="bg-gray-900 p-8 rounded-xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-xl">
                                🔥
                            </div>
                            <h3 class="text-xl font-bold ml-4">Paket Enterprise</h3>
                        </div>
                        <p class="mb-6 text-gray-300">Solusi kustom untuk kebutuhan perusahaan besar.</p>
                        <div class="text-2xl font-bold mb-2">Hubungi Kami</div>
                        <div class="text-sm text-blue-400 mb-6">harga khusus</div>
                        <button class="w-full py-3 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg font-bold">
                            Konsultasi
                        </button>
                    </div>
                </x-tilt-card>
            </div>
            
            <div class="max-w-2xl mx-auto mt-16 text-center">
                <x-text-reveal delay="0.3" class="text-lg text-gray-300">
                    Efek 3D tilt memberikan sentuhan interaktif dan dimensi ekstra pada kartu premium Anda, menciptakan pengalaman yang tak terlupakan
                </x-text-reveal>            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Deep Parallax Effect
        const scene = document.querySelector('.deep-parallax-scene');
        const layers = document.querySelectorAll('.deep-parallax-layer');
        
        if (scene && layers.length) {
            const sceneHeight = scene.offsetHeight;
            const sceneTop = scene.getBoundingClientRect().top + window.scrollY;
            const sceneBottom = sceneTop + sceneHeight;
            
            function updateParallax() {
                const scrollPosition = window.scrollY;
                const relativePosition = (scrollPosition - sceneTop + window.innerHeight) / (sceneHeight + window.innerHeight);
                
                if (scrollPosition + window.innerHeight >= sceneTop && scrollPosition <= sceneBottom) {
                    layers.forEach(layer => {
                        const depth = parseFloat(layer.getAttribute('data-depth') || 0.5);
                        const movement = (relativePosition - 0.5) * depth * 200; // Adjust multiplier for more or less movement
                        
                        // Move layers based on their depth
                        layer.style.transform = `translateZ(${movement * -1}px)`;
                    });
                }
            }
            
            // Initial update
            updateParallax();
            
            // Update on scroll
            window.addEventListener('scroll', updateParallax);
            
            // Text elements with depth scrolling
            const depthScrollElements = document.querySelectorAll('[data-depth-scroll]');
            
            function updateDepthScrollElements() {
                const scrollPosition = window.scrollY;
                
                depthScrollElements.forEach(element => {
                    const depth = parseFloat(element.getAttribute('data-depth-scroll') || 0.2);
                    const elementTop = element.getBoundingClientRect().top + window.scrollY;
                    const elementHeight = element.offsetHeight;
                    const elementRelativePosition = (scrollPosition - elementTop + window.innerHeight) / (elementHeight + window.innerHeight);
                    
                    if (scrollPosition + window.innerHeight >= elementTop && scrollPosition <= elementTop + elementHeight) {
                        const movement = (elementRelativePosition - 0.5) * depth * 100;
                        element.style.transform = `translateY(${movement}px)`;
                    }
                });
            }
            
            // Initial update for text elements
            updateDepthScrollElements();
            
            // Update text elements on scroll
            window.addEventListener('scroll', updateDepthScrollElements);
        }
    });
</script>
@endpush
