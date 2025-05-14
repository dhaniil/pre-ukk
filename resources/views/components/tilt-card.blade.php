{{-- resources/views/components/tilt-card.blade.php --}}
@props([
    'perspective' => 1000,
    'max' => 15,
    'scale' => 1.05,
    'speed' => 1000,
    'glare' => true,
    'glareMax' => 0.35,
    'gyroscope' => true,
    'class' => '',
])

<div 
    {{ $attributes->merge(['class' => 'tilt-card ' . $class]) }}
    data-tilt-perspective="{{ $perspective }}"
    data-tilt-max="{{ $max }}"
    data-tilt-scale="{{ $scale }}"
    data-tilt-speed="{{ $speed }}"
    data-tilt-glare="{{ $glare ? 'true' : 'false' }}"
    data-tilt-glare-max="{{ $glareMax }}"
    data-tilt-gyroscope="{{ $gyroscope ? 'true' : 'false' }}"
>
    {{ $slot }}
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tiltCards = document.querySelectorAll('.tilt-card');
                
                tiltCards.forEach(card => {
                    const perspective = parseFloat(card.dataset.tiltPerspective || 1000);
                    const max = parseFloat(card.dataset.tiltMax || 15);
                    const scale = parseFloat(card.dataset.tiltScale || 1.05);
                    const speed = parseFloat(card.dataset.tiltSpeed || 1000);
                    const glare = card.dataset.tiltGlare === 'true';
                    const glareMax = parseFloat(card.dataset.tiltGlareMax || 0.35);
                    const gyroscope = card.dataset.tiltGyroscope === 'true';
                    
                    // Set up the 3D tilt effect
                    setupTiltEffect(card, {
                        perspective,
                        max,
                        scale,
                        speed,
                        glare,
                        glareMax,
                        gyroscope
                    });
                    
                    // Use GSAP for entrance animation
                    gsap.from(card, {
                        y: 50,
                        opacity: 0,
                        scale: 0.9,
                        duration: 0.8,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: card,
                            start: 'top 85%',
                        }
                    });
                });
                
                function setupTiltEffect(element, options) {
                    let ticking = false;
                    let tiltX = 0;
                    let tiltY = 0;
                    let glareElement = null;
                    
                    // Create glare element if needed
                    if (options.glare) {
                        glareElement = document.createElement('div');
                        glareElement.className = 'js-tilt-glare';
                        glareElement.style.position = 'absolute';
                        glareElement.style.top = '0';
                        glareElement.style.left = '0';
                        glareElement.style.width = '100%';
                        glareElement.style.height = '100%';
                        glareElement.style.overflow = 'hidden';
                        glareElement.style.pointerEvents = 'none';
                        glareElement.style.zIndex = '1';
                        
                        const glareInner = document.createElement('div');
                        glareInner.className = 'js-tilt-glare-inner';
                        glareInner.style.position = 'absolute';
                        glareInner.style.top = '50%';
                        glareInner.style.left = '50%';
                        glareInner.style.transform = 'translate(-50%, -50%)';
                        glareInner.style.width = '200%';
                        glareInner.style.height = '200%';
                        glareInner.style.backgroundImage = 'linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)';
                        glareInner.style.opacity = '0';
                        glareInner.style.transformOrigin = '0% 0%';
                        glareInner.style.transition = `opacity ${options.speed}ms ease-out`;
                        
                        glareElement.appendChild(glareInner);
                        element.appendChild(glareElement);
                        
                        // Make sure the element has a position for the glare to work
                        if (getComputedStyle(element).position === 'static') {
                            element.style.position = 'relative';
                        }
                    }
                    
                    // Set transform style
                    element.style.transformStyle = 'preserve-3d';
                    element.style.transition = `transform ${options.speed}ms ease-out`;
                    
                    // Mouse move handler for tilt effect
                    function mouseMove(event) {
                        const rect = element.getBoundingClientRect();
                        const width = rect.width;
                        const height = rect.height;
                        const mouseX = event.clientX - rect.left;
                        const mouseY = event.clientY - rect.top;
                        
                        const percentX = (mouseX / width) * 2 - 1;
                        const percentY = (mouseY / height) * 2 - 1;
                        
                        tiltX = -percentY * options.max;
                        tiltY = percentX * options.max;
                        
                        requestTilt();
                    }
                    
                    // Device orientation handler for gyroscope support
                    function deviceOrientationHandler(event) {
                        if (!options.gyroscope) return;
                        
                        const beta = event.beta === null ? 0 : event.beta;  // x-axis (-180 to 180)
                        const gamma = event.gamma === null ? 0 : event.gamma; // y-axis (-90 to 90)
                        
                        const multiplier = options.max / 90;
                        
                        tiltX = beta * multiplier;
                        tiltY = gamma * multiplier;
                        
                        requestTilt();
                    }
                    
                    // Apply tilt transformation
                    function requestTilt() {
                        if (!ticking) {
                            requestAnimationFrame(() => {
                                updateTransform();
                                ticking = false;
                            });
                            ticking = true;
                        }
                    }
                    
                    function updateTransform() {
                        const transform = `perspective(${options.perspective}px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(${options.scale}, ${options.scale}, ${options.scale})`;
                        element.style.transform = transform;
                        
                        // Update glare if enabled
                        if (options.glare) {
                            const glareInner = glareElement.querySelector('.js-tilt-glare-inner');
                            const glareAngle = (Math.atan2(tiltY, tiltX) * 180) / Math.PI;
                            const glareOpacity = (Math.sqrt(tiltX * tiltX + tiltY * tiltY) / options.max) * options.glareMax;
                            
                            glareInner.style.transform = `rotate(${glareAngle}deg) translate(-50%, -50%)`;
                            glareInner.style.opacity = glareOpacity.toString();
                        }
                    }
                    
                    // Reset transform
                    function mouseLeave() {
                        tiltX = 0;
                        tiltY = 0;
                        requestTilt();
                    }
                    
                    // Add listeners
                    element.addEventListener('mousemove', mouseMove);
                    element.addEventListener('mouseleave', mouseLeave);
                    if (options.gyroscope) {
                        window.addEventListener('deviceorientation', deviceOrientationHandler);
                    }
                    
                    // Remove tilt effect when the element is removed
                    const observer = new MutationObserver((mutations) => {
                        mutations.forEach((mutation) => {
                            if (Array.from(mutation.removedNodes).includes(element)) {
                                element.removeEventListener('mousemove', mouseMove);
                                element.removeEventListener('mouseleave', mouseLeave);
                                if (options.gyroscope) {
                                    window.removeEventListener('deviceorientation', deviceOrientationHandler);
                                }
                                observer.disconnect();
                            }
                        });
                    });
                    
                    observer.observe(element.parentNode, { childList: true });
                }
            });
        </script>
    @endpush
@endonce
