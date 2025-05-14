{{-- resources/views/components/parallax-section.blade.php --}}
@props([
    'height' => '80vh',
    'colors' => 'from-indigo-900 via-purple-800 to-pink-700',
    'class' => '',
])

<div 
    {{ $attributes->merge(['class' => 'parallax-container relative ' . $class]) }}
    style="height: {{ $height }};"
    data-parallax-colors="{{ $colors }}"
>
    <div class="parallax-background absolute inset-0 bg-gradient-to-br {{ $colors }} w-full h-full"></div>
    <div class="parallax-content relative z-10 flex items-center justify-center w-full h-full">
        {{ $slot }}
    </div>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const parallaxContainers = document.querySelectorAll('.parallax-container');
                
                parallaxContainers.forEach(container => {
                    const background = container.querySelector('.parallax-background');
                    
                    // Efek parallax dengan ScrollTrigger
                    gsap.to(background, {
                        y: '30%',
                        ease: 'none',
                        scrollTrigger: {
                            trigger: container,
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: true
                        }
                    });

                    // Efek tambahan: scale dan opacity saat scroll
                    gsap.fromTo(background, 
                        { scale: 1.1, opacity: 1 },
                        { 
                            scale: 1.3, 
                            opacity: 0.8,
                            ease: 'none',
                            scrollTrigger: {
                                trigger: container,
                                start: 'top bottom',
                                end: 'bottom top',
                                scrub: true
                            }
                        }
                    );
                });
            });
        </script>
    @endpush
@endonce
