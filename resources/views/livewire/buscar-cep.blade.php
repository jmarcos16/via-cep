<div class="max-w-3xl py-24 mx-auto sm:px-6 lg:px-8">
    <div class="bg-white border rounded-lg shadow-lg">
        <div class="p-4 border-b">
            <h1 class="font-bold">Buscar Cep</h1>
        </div>

        <div class="px-4 py-6">
            <div class="flex gap-3">
                <x-text-input
                    x-mask:dynamic="postalCodeMask"
                    class="w-full py-2 rounded" 
                    wire:model="inputCep"
                    wire:keydown.enter="searchCep"
                    placeholder="Digite seu cep"
                    type="text"
                    autocomplete="off" 
                    autofocus />
                <x-secondary-button class="px-6 py-2" wire:click="searchCep">
                    Search
                </x-secondary-button>
            </div>
            <x-input-error class="relative mt-2" :messages="$errors->get('inputCep')" />

            <div class="grid grid-cols-6 gap-3 mt-10">
                <div class="w-full col-span-4">
                    <x-input-label for="logradouro" value="Logradouro" />
                    <x-text-input 
                        class="w-full py-2 rounded"
                        type="text"
                        name="logradouro"
                        id="logradouro"
                        :value="data_get($endereco, 'logradouro')"
                        autocomplete="off" />
                </div>
                <div class="w-full col-span-2">
                    <x-input-label for="cep" value="Código Postal" />
                    <x-text-input 
                        class="w-full py-2 rounded"
                        type="text"
                        name="cep"
                        id="cep"
                        :value="data_get($endereco, 'cep')"
                        autocomplete="off" />
                </div>
                <div class="w-full col-span-3">
                    <x-input-label for="bairro" value="Bairro" />
                    <x-text-input 
                        class="w-full py-2 rounded"
                        type="text"
                        name="bairro"
                        id="bairro"
                        :value="data_get($endereco, 'bairro')"
                        autocomplete="off" />
                </div>
                <div class="w-full col-span-3">
                    <x-input-label for="cidade" value="Cidade" />
                    <x-text-input 
                        class="w-full py-2 rounded"
                        type="text"
                        name="cidade"
                        id="cidade"
                        :value="data_get($endereco, 'localidade')"
                        autocomplete="off" />
                </div>
            </div>
        </div>
    </div>
    <x-loading-spinner 
        wire:loading
        wire:target="searchCep"
        class="hidden w-16 h-16" />
</div>
<script>
    function postalCodeMask(input) {
        return input.replace(/\D/g, '').replace(/(\d{5})(\d{3})/, '$1-$2')
    }
</script>