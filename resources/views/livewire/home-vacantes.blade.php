<div>
    <div class="px-2">
        <livewire:filtrar-vacantes />
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600"
                               href="{{ route('vacantes.show', $vacante) }}">
                               {{ $vacante->titulo }}
                            </a>
                            <p class="text-sm font-bold mb-0.5 text-gray-600">Categoría: <span class="text-base font-normal">{{ $vacante->categoria->categoria }}</span></p>
                            <p class="text-sm font-bold mb-0.5 text-gray-600">Empresa: <span class="text-base font-normal">{{ $vacante->empresa }}</span></p>
                            <p class="text-sm font-bold mb-0.5 text-gray-600">Salario: <span class="text-base font-normal">{{ $vacante->salario->salario }}</span></p>
                            <p class="font-bold text-sm text-gray-600">Último día para postularse: <span class="font-normal">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span></p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a class="uppercase font-bold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 transition-colors text-sm p-3 block text-center"
                               href="{{ route('vacantes.show', $vacante) }}">
                               Ver Vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endforelse
            </div>
            
            <div class="m-2">
                {{ $vacantes->links() }}
            </div>
        </div>
    </div>
</div>
