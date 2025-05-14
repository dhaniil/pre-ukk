{{-- resources/views/components/text-reveal.blade.php --}}
@props([
    'tag' => 'div',
    'delay' => 0,
    'stagger' => 0.05,
    'duration' => 1.2,
    'from' => 'bottom',
    'distance' => 30,
    'ease' => 'power3.out',
    'class' => '',
])

<{{ $tag }}
    {{ $attributes->merge(['class' => 'text-reveal ' . $class]) }}
    data-text-delay="{{ $delay }}"
    data-text-stagger="{{ $stagger }}"
    data-text-duration="{{ $duration }}"
    data-text-from="{{ $from }}"
    data-text-distance="{{ $distance }}"
    data-text-ease="{{ $ease }}"
>
    {{ $slot }}
</{{ $tag }}>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const textRevealElements = document.querySelectorAll('.text-reveal');

                textRevealElements.forEach(element => {
                    const delay = parseFloat(element.dataset.textDelay || 0);
                    const stagger = parseFloat(element.dataset.textStagger || 0.05);
                    const duration = parseFloat(element.dataset.textDuration || 1.2);
                    const from = element.dataset.textFrom || 'bottom';
                    const distance = parseFloat(element.dataset.textDistance || 30);
                    const ease = element.dataset.textEase || 'power3.out';

                    // Wrap each word in a span
                    const text = element.innerHTML;
                    const words = text.split(/(<[^>]*>)|(\s+)/).filter(Boolean);
                    
                    let html = '';
                    words.forEach(word => {
                        if (word.trim() === '' || word.match(/<[^>]*>/)) {
                            html += word;
                        } else {
                            html += `<span class="text-reveal-word inline-block">${word}</span>`;
                        }
                    });
                    
                    element.innerHTML = html;

                    // Animasi untuk setiap kata
                    const words = element.querySelectorAll('.text-reveal-word');
                    
                    // Tentukan posisi awal berdasarkan parameter 'from'
                    let fromVars = { y: distance, opacity: 0 };
                    if (from === 'left') fromVars = { x: -distance, opacity: 0 };
                    if (from === 'right') fromVars = { x: distance, opacity: 0 };
                    if (from === 'top') fromVars = { y: -distance, opacity: 0 };

                    // Set posisi awal
                    gsap.set(words, fromVars);
                    
                    // Timeline dengan ScrollTrigger
                    const tl = gsap.timeline({
                        scrollTrigger: {
                            trigger: element,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        }
                    });
                    
                    // Animasikan setiap kata dengan stagger
                    tl.to(words, {
                        x: 0,
                        y: 0,
                        opacity: 1,
                        duration: duration,
                        stagger: stagger,
                        delay: delay,
                        ease: ease
                    });
                });
            });
        </script>
    @endpush
@endonce
