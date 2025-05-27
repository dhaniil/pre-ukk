import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";
import AOS from "aos";
import "aos/dist/aos.css";

// Initialize AOS with configuration - per documentation at https://michalsnik.github.io/aos/
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 1000,           // values from 0 to 3000, with step 50ms
        easing: 'ease',          // default easing for AOS animations
        once: false,             // whether animation should happen only once - while scrolling down
        mirror: false,           // whether elements should animate out while scrolling past them
        offset: 120,             // offset (in px) from the original trigger point
        delay: 0,                // values from 0 to 3000, with step 50ms
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
    });
});

// Refresh AOS on Livewire updates (for Laravel Livewire compatibility)
document.addEventListener('livewire:navigated', () => {
    AOS.refresh();
});

// Also refresh AOS on any Livewire updates
document.addEventListener('livewire:load', () => {
    Livewire.hook('message.processed', (message, component) => {
        AOS.refresh();
    });
});

gsap.registerPlugin(ScrollTrigger);

window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
