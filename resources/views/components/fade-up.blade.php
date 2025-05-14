{{-- resources/views/components/fade-up.blade.php --}}
@props([
    'delay' => 0,
    'duration' => 0.8,
    'distance' => 50,
    'once' => false,
    'scrub' => false,
    'ease' => 'power2.out',
    'class' => '',
    'tag' => 'div'
])

<{{ $tag }}
    {{ $attributes->merge(['class' => 'fade-up-element opacity-0 ' . $class]) }}
    data-fade-delay="{{ $delay }}"
    data-fade-duration="{{ $duration }}"
    data-fade-distance="{{ $distance }}"
    data-fade-once="{{ $once ? 'true' : 'false' }}"
    data-fade-scrub="{{ $scrub ? 'true' : 'false' }}"
    data-fade-ease="{{ $ease }}"
>
{{ $slot }}
</{{ $tag }}>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Pastikan GSAP dan ScrollTrigger sudah diimpor di app.js
                const fadeUpElements = document.querySelectorAll('.fade-up-element');

                fadeUpElements.forEach(element => {
                    const delay = parseFloat(element.dataset.fadeDelay || 0);
                    const duration = parseFloat(element.dataset.fadeDuration || 0.8);
                    const distance = parseFloat(element.dataset.fadeDistance || 50);
                    const once = element.dataset.fadeOnce === 'true';
                    const scrub = element.dataset.fadeScrub === 'true';
                    const ease = element.dataset.fadeEase || 'power2.out';

                    gsap.set(element, {
                        y: distance,
                        opacity: 0
                    });

                    // Konfigurasi ScrollTrigger yang lebih dinamis
                    const scrollConfig = {
                        trigger: element,
                        start: "top 85%",
                        end: "top 15%",
                        toggleActions: once ? "play none none none" : "play reverse play reverse",
                        markers: false
                    };
                    
                    // Jika scrub diaktifkan, tambahkan opsi scrub
                    if (scrub) {
                        scrollConfig.scrub = 0.5; // Nilai scrub bisa disesuaikan (0.5 = setengah kecepatan scroll)
                    }

                    gsap.to(element, {
                        y: 0,
                        opacity: 1,
                        duration: duration,
                        delay: delay,
                        ease: ease,
                        scrollTrigger: scrollConfig
                    });
                });
            });
        </script>
    @endpush
@endonce
