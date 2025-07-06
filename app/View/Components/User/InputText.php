<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    public string $type;
    public string $name;
    public string $label;
    public ?string $value;
    public ?string $placeholder;
    public ?bool $required;
    public bool $readonly;
   
    
    public function __construct(
        string $type,
        string $name,
        ?string $label = null,
        ?string $value = null,
        ?string $placeholder = null,
        bool $required = false,
        bool $readonly = false,
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label ?? \Str::title(str_replace('_', ' ', $name));
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->readonly = $readonly;
    }



    public function render(): View|Closure|string
    {
        return view('components.user.input-text');
    }
}
