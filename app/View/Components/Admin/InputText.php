<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    public string $name;
    public string $label;
    public string $type;
    public ?string $value;
    public ?string $placeholder;
    public bool $readonly;

    public function __construct(
        string $name,
        string $type,
        ?string $label = null,
        ?string $value = null,
        ?string $placeholder = null,
        bool $readonly = false,
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label ?? \Str::title(str_replace('_', ' ', $name));
        $this->value = old($name, $value);
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.input-text');
    }
}
