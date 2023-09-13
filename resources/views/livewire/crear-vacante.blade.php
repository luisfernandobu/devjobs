<div class="md:w-1/2">
    <form  wire:submit.prevent="crearVacante">
        <div class="mt-4">
            <x-input-label for="titulo" :value="__('Título de vacante')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Título de vacante"/>
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="salario" :value="__('Salario mensual')" />
            <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="salario" id="salario" required>
                <option value="" selected>-- Seleccione un salario --</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('salario')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="categoria" :value="__('Categoría')" />
            <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="categoria" id="categoria" required>
                <option value="" selected>-- Seleccione una categoría --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Ej. Netflix, Uber, Spotify"/>
            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
            <textarea
                wire:model="descripcion"
                id="descripcion"
                placeholder="Descripción general del puesto, experiencia"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-72"
            >{{ old('descripcion') }}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div class="my-4">
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*"/>
            {{-- preview de imagen seleccionada --}}
            @if ($imagen)
                <div class="my-5 w-80">
                    Imagen:
                    <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen de vacante">
                </div>
            @endif
            <x-input-error :messages="$errors->get('imagen')" class="mt-2"/>
        </div>

        <x-primary-button>Crear vacante</x-primary-button>
    </form> <!-- fin de form -->
</div>
