<?php

namespace App\View\Components\todolist;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Enums\Status;

class Item extends Component
{
    /**
     * Create a new component instance.
     */
    public $statuses;
    
    public function __construct()
    {
        $this->statuses = Status::cases();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todolist.item');
    }
}
