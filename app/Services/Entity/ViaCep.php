<?php
namespace App\Services\Entity;

use Illuminate\Contracts\Support\Arrayable;

class ViaCep implements Arrayable
{
    public ?string $cep;
    public ?string $logradouro;
    public ?string $complemento;
    public ?string $bairro;
    public ?string $localidade;

    public function __construct(array $data = [])
    {
        $this->cep = data_get($data, 'cep');
        $this->logradouro = data_get($data, 'logradouro');
        $this->complemento = data_get($data, 'complemento');
        $this->bairro = data_get($data, 'bairro');
        $this->localidade = data_get($data, 'localidade');
    }

    public function toArray()
    {
        return [
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'localidade' => $this->localidade,
        ];
    }
}