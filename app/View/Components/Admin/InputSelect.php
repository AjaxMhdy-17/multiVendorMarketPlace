<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
    public string $name;
    public string $label;

    public function __construct(
        string $name,
        ?string $label = null,
    ) {
        $this->name = $name;
        $this->label = $label ?? \Str::title(str_replace('_', ' ', $name));
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.input-select');
    }
}
