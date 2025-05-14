{{-- Contoh penggunaan animasi fade-up yang lebih interaktif --}}
<div class="container mx-auto py-16 text-black">
    {{-- Header dengan efek fade-up --}}
    {{-- Header dengan animasi yang lebih dramatis --}}
    <x-fade-up class="mb-10" distance="100" duration="1.2">
        <h1 class="text-5xl font-bold text-center bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Animasi Interaktif</h1>
    </x-fade-up>

    <x-fade-up delay="0.2" class="mb-8 text-center" distance="80">
        <p class="text-xl">Scroll ke bawah dan ke atas untuk melihat elemen-elemen muncul dan menghilang dengan efek yang dinamis.</p>
    </x-fade-up>

    {{-- Bagian kartu dengan waktu tunda yang bertahap --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 my-16">
        {{-- Item 1 dengan animasi berulang --}}
        <x-fade-up delay="0.3" class="bg-white rounded-xl shadow-xl p-8 transform hover:scale-105 transition-transform duration-300">
            <div class="text-blue-500 text-4xl mb-4">🚀</div>
            <h3 class="text-2xl font-semibold mb-3">Animasi Berulang</h3>
            <p>Elemen ini akan muncul setiap kali Anda scroll ke area ini, memberikan pengalaman yang dinamis.</p>
        </x-fade-up>

        {{-- Item 2 dengan jarak yang lebih jauh --}}
        <x-fade-up delay="0.5" distance="120" class="bg-white rounded-xl shadow-xl p-8 transform hover:scale-105 transition-transform duration-300">
            <div class="text-green-500 text-4xl mb-4">✨</div>
            <h3 class="text-2xl font-semibold mb-3">Jarak Lebih Jauh</h3>
            <p>Perhatikan bagaimana elemen ini muncul dari jarak yang lebih jauh, menciptakan efek yang lebih dramatis.</p>
        </x-fade-up>

        {{-- Item 3 dengan durasi yang lebih lama --}}
        <x-fade-up delay="0.7"  class="bg-white rounded-xl shadow-xl p-8 transform hover:scale-105 transition-transform duration-300">
            <div class="text-purple-500 text-4xl mb-4">🎯</div>
            <h3 class="text-2xl font-semibold mb-3">Durasi Panjang</h3>
            <p>Elemen ini memiliki durasi animasi yang lebih lama, memberikan efek yang lebih halus dan elegan.</p>
        </x-fade-up>
    </div>

    {{-- Bagian dengan efek scrub (animasi mengikuti scroll) --}}
    <x-fade-up tag="section" scrub="true" distance="150" class="my-20 p-10 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center">Efek Scrub</h2>
        <p class="text-lg text-center">
            Elemen ini menggunakan efek "scrub" yang mengikat animasi ke posisi scroll Anda. Coba scroll perlahan untuk melihat perbedaannya!
        </p>
    </x-fade-up>

    {{-- Timeline dengan animasi staggered --}}
    <div class="my-24 space-y-16">
        <h2 class="text-3xl font-bold text-center mb-12">
            <x-fade-up>Timeline Fitur</x-fade-up>
        </h2>

        {{-- Timeline item 1 --}}
        <div class="flex flex-col md:flex-row items-center">
            <x-fade-up class="w-full md:w-1/2 p-6" delay="0.1">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Menghidupkan UI Anda</h3>
                    <p>Animasi yang responsif membuat pengalaman pengguna lebih menarik dan intuitif. Scroll kembali ke atas untuk melihat animasi berulang!</p>
                </div>
            </x-fade-up>
            <x-fade-up class="w-full md:w-1/2 p-6" delay="0.4" distance="80">
                <img src="https://via.placeholder.com/600x400/4F46E5/FFFFFF?text=Animation+Demo" alt="Animation Demo" class="rounded-xl shadow-lg w-full">
            </x-fade-up>
        </div>

        {{-- Timeline item 2 --}}
        <div class="flex flex-col md:flex-row-reverse items-center">
            <x-fade-up class="w-full md:w-1/2 p-6" delay="0.1">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Kustomisasi Penuh</h3>
                    <p>Sesuaikan delay, durasi, jarak, dan elemen HTML sesuai kebutuhan Anda. Fleksibilitas tanpa batas!</p>
                </div>
            </x-fade-up>
            <x-fade-up class="w-full md:w-1/2 p-6" delay="0.4" distance="80">
                <img src="https://via.placeholder.com/600x400/10B981/FFFFFF?text=Customization" alt="Customization" class="rounded-xl shadow-lg w-full">
            </x-fade-up>
        </div>
    </div>

    {{-- CTA yang menarik dengan animasi lebih dramatis --}}
    <x-fade-up distance="200" duration="1.2" ease="elastic.out(1, 0.3)" class="my-20 text-center">
        <div class="bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl p-10 shadow-2xl">
            <h2 class="text-4xl font-bold text-white mb-6">Siap Untuk Memulai?</h2>
            <p class="text-xl text-white mb-8">Scroll kembali ke atas dan lihat bagaimana setiap elemen kembali dengan animasi yang menarik!</p>
            <button class="bg-white text-purple-600 px-8 py-3 rounded-full font-bold text-lg transform hover:scale-105 transition-transform">Mulai Sekarang</button>
        </div>
    </x-fade-up>
</div>
