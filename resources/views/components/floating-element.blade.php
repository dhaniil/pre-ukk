{{-- resources/views/components/floating-element.blade.php --}}
@props([
    'delay' => 0,
    'duration' => 2,
    'amplitude' => 15,
    'rotation' => 5,
    'staggerDelay' => 0.2,
    'ease' => 'sine.inOut',
    'class' => '',
])

<div
    {{ $attributes->merge(['class' => 'floating-element ' . $class]) }}
    data-float-delay="{{ $delay }}"
    data-float-duration="{{ $duration }}"
    data-float-amplitude="{{ $amplitude }}"
    data-float-rotation="{{ $rotation }}"
    data-float-stagger-delay="{{ $staggerDelay }}"
    data-float-ease="{{ $ease }}"
>
    {{ $slot }}
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const floatingElements = document.querySelectorAll('.floating-element');
                
                floatingElements.forEach((element, index) => {
                    const delay = parseFloat(element.dataset.floatDelay || 0);
                    const duration = parseFloat(element.dataset.floatDuration || 2);
                    const amplitude = parseFloat(element.dataset.floatAmplitude || 15);
                    const rotation = parseFloat(element.dataset.floatRotation || 5);
                    const staggerDelay = parseFloat(element.dataset.floatStaggerDelay || 0.2);
                    const ease = element.dataset.floatEase || 'sine.inOut';
                    
                    // Animasi float
                    const floatTimeline = gsap.timeline({
                        repeat: -1,
                        yoyo: true,
                        delay: delay + (index * staggerDelay)
                    });
                    
                    // Gerakan float dasar
                    floatTimeline.to(element, {
                        y: `-=${amplitude}`,
                        rotation: `+=${rotation / 2}`,
                        duration: duration / 2,
                        ease: ease
                    })
                    .to(element, {
                        y: `+=${amplitude}`,
                        rotation: `-=${rotation}`,
                        duration: duration / 2,
                        ease: ease
                    })
                    .to(element, {
                        y: 0,
                        rotation: `+=${rotation / 2}`,
                        duration: duration / 2,
                        ease: ease
                    });
                    
                    // Efek entri dengan scroll
                    gsap.from(element, {
                        y: 50,
                        opacity: 0,
                        scale: 0.9,
                        duration: 1,
                        ease: 'power2.out',
                        scrollTrigger: {
                            trigger: element,
                            start: 'top 85%',
                        }
                    });
                });
            });
        </script>
    @endpush
@endonce
