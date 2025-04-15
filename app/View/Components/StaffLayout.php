<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StaffLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $type = session('user_type');

        if ($type === 'admin') {
            return view('layouts.admin');
        } 

        // Par défaut
        return view('layouts.app');
    }
}
