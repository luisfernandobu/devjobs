<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if (count($vacantes))
            @foreach ($vacantes as $vacante)
                <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between">
                <div class="space-y-3">
                        <a href="{{ route('vacantes.show', $vacante) }}" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm font-bold text-gray-600">{{ $vacante->empresa }}</p>
                        <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
    
                <div class="flex flex-col md:flex-row gap-3 items-stretch md:items-center mt-5 md:mt-0">
                    <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidatos</a>
                    <a href="{{ route('vacantes.edit', $vacante) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                    <button wire:click="$emit('mostrarConfirmacion', {{ $vacante->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
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

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('mostrarConfirmacion', vacanteId => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('eliminarVacante', vacanteId);
                        Swal.fire(
                        '¡Vacante Eliminada!',
                        'La vacante se eliminó correctamente.',
                        'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
