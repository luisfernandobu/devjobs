<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if (count($vacantes))
            @foreach ($vacantes as $vacante)
                <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between">
                <div class="space-y-3">
                        <a href="#" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm font-bold text-gray-600">{{ $vacante->empresa }}</p>
                        <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
    
                <div class="flex flex-col md:flex-row gap-3 items-stretch md:items-center mt-5 md:mt-0">
                    <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidatos</a>
                    <a href="{{ route('vacantes.edit', $vacante) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                    <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</a>
                </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-500 py-5">Sin vacantes para mostrar</p>
        @endif
    </div>

    <div class="mt-7 mx-2 md:mx-0">
        {{ $vacantes->links() }}
    </div>
</div>
