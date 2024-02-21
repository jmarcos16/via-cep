<?php

namespace App\Livewire;

use App\Services\ViaCepService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BuscarCep extends Component
{
    #[Validate('required|regex:/^\d{5}-\d{3}$/')]
    public string $inputCep = '';

    public array $endereco = [];

    public function searchCep(ViaCepService $service): void
    {
        $this->validate();
        
        try {
            $this->endereco = $service->find($this->inputCep)->toArray();
        } catch (\InvalidArgumentException $e) {
            $this->addError('inputCep', $e->getMessage());
        }
        $this->reset('inputCep');
    }
    
    public function render()
    {
        return view('livewire.buscar-cep');
    }
}
