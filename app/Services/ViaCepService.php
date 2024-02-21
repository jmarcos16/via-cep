<?php
namespace App\Services;

use App\Services\Entity\ViaCep;
use Illuminate\Support\Facades\Http;

class ViaCepService
{
    public function __construct(
        private Http $service, 
        private string $url = 'https://viacep.com.br/ws/'
    ){
    }

    public function find(string $cep): ViaCep
    {
        $response = $this->service::get($this->url . $cep . '/json')->json();

        if (array_key_exists('erro', $response)) {
            throw new \InvalidArgumentException('O cep informado não foi encontrado.');
        }

        $response['localidade'] = $response['localidade'] . '-' . $response['uf'];
        return new ViaCep($response);
    }

    protected function resolveCep(string $cep): string
    {
        strlen($cep) === 8 ?: throw new \InvalidArgumentException('CEP inválido');
        return str_replace('-', '', $cep);
    }
}
