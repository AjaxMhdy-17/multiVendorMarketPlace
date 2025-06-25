<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextArea extends Component
{
    public string $name;
    public string $label;
    public string $type;
    public ?string $value;
    public ?string $placeholder;
    public bool $readonly;

    public function __construct(
        string $name,
        ?string $label = null,
        ?string $value = null,
        ?string $placeholder = null,
    ) {
        $this->name = $name;
        $this->label = $label ?? \Str::title(str_replace('_', ' ', $name));
        $this->value = $value;
        $this->placeholder = $placeholder;
    }


    public function render(): View|Closure|string
    {
        return view('components.admin.input-text-area');
    }
}
