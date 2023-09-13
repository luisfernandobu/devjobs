<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }

    public function eliminarVacante(Vacante $vacante)
    {
        $imagen = $vacante->imagen;

        // eliminar vacante
        if ($vacante->delete()) {
            // eliminar imagen de vacante
            Storage::delete('public/vacantes/' . $imagen);
        }

        return redirect(request()->header('Referer'));
    }
}
