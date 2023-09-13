<div class="mt-10 flex flex-col justify-center items-center bg-gray-100 p-5">
    <h3 class="text-center font-bold text-2xl my-3">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <p class="border border-green-600 bg-green-100 text-green-600 font-bold uppercase text-sm p-2 my-3 rounded-lg">
            {{ session('mensaje') }}
        </p>
    @else
        <form wire:submit.prevent="postularme" class="w-100 mt-5">
            <div class="mb-5">
                <x-input-label for="cv" :value="__('Currículum u Hoja de Vida (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="mt-1 block w-full"/>
                <x-input-error :messages="$errors->get('cv')" class="mt-2"/>
            </div>

            <x-primary-button>Postularme</x-primary-button>
        </form>
    @endif
</div>
