<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;
    public $component;
    public $title;
    public $params;

    protected $listeners = [
        'openModal',
        'closeModal',
    ];

    public function mount(): void
    {
        //
    }

    public function openModal($component, $title ,$params = null): void
    {
        $this->component = $component;
        $this->params = $params;
        $this->title = $title;
        $this->show = true;
    }

    public function closeModal(): void
    {
        $this->resetModal();
        $this->show = false;
    }

    public function render()
    {
        return view('components.modal');
    }

    protected function resetModal(): void
    {
        $this->component = null;
        $this->title = null;
        $this->params = null;
    }
}
