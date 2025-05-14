{{-- resources/views/components/zoom-parallax.blade.php --}}
@props([
    'trigger' => 'scroll', 
    'scale' => 1.5,
    'duration' => 1.8,
    'ease' => 'power2.inOut',
    'delay' => 0,
    'class' => '',
])

<div 
    {{ $attributes->merge(['class' => 'zoom-parallax overflow-hidden ' . $class]) }}
    data-zoom-scale="{{ $scale }}"
    data-zoom-duration="{{ $duration }}"
    data-zoom-ease="{{ $ease }}"
    data-zoom-delay="{{ $delay }}"
    data-zoom-trigger="{{ $trigger }}"
>
    {{ $slot }}
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const zoomElements = document.querySelectorAll('.zoom-parallax');
                
                zoomElements.forEach(container => {
                    const scale = parseFloat(container.dataset.zoomScale || 1.5);
                    const duration = parseFloat(container.dataset.zoomDuration || 1.8);
                    const ease = container.dataset.zoomEase || 'power2.inOut';
                    const delay = parseFloat(container.dataset.zoomDelay || 0);
                    const trigger = container.dataset.zoomTrigger || 'scroll';
                    
                    // Set initial state
                    gsap.set(container.children, {
                        scale: 1,
                        transformOrigin: 'center center'
                    });
                    
                    if (trigger === 'scroll') {
                        // Create zoom effect on scroll
                        gsap.to(container.children, {
                            scale: scale,
                            ease: ease,
                            scrollTrigger: {
                                trigger: container,
                                start: 'top bottom',
                                end: 'bottom top',
                                scrub: 1,
                            }
                        });
                    } else if (trigger === 'hover') {
                        // Create zoom effect on hover
                        container.addEventListener('mouseenter', () => {
                            gsap.to(container.children, {
                                scale: scale,
                                duration: duration,
                                ease: ease,
                                delay: delay
                            });
                        });
                        
                        container.addEventListener('mouseleave', () => {
                            gsap.to(container.children, {
                                scale: 1,
                                duration: duration,
                                ease: ease
                            });
                        });
                    } else if (trigger === 'view') {
                        // Create zoom effect when element enters viewport
                        gsap.fromTo(container.children,
                            { scale: 1 },
                            { 
                                scale: scale,
                                duration: duration,
                                ease: ease,
                                delay: delay,
                                scrollTrigger: {
                                    trigger: container,
                                    start: 'top 70%',
                                    toggleActions: 'play none none reverse'
                                }
                            }
                        );
                    }
                });
            });
        </script>
    @endpush
@endonce
