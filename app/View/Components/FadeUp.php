<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FadeUp extends Component
{
    public $delay;
    public $duration;
    public $distance;
    public $once;
    public $scrub;
    public $ease;
    public $tag;
    
    /**
     * Create a new component instance.
     */
    public function __construct($delay = 0, $duration = 0.8, $distance = 50, $once = false, $scrub = false, $ease = 'power2.out', $tag = 'div')
    {
        $this->delay = $delay;
        $this->duration = $duration;
        $this->distance = $distance;
        $this->once = $once;
        $this->scrub = $scrub;
        $this->ease = $ease;
        $this->tag = $tag;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fade-up');
    }
}
