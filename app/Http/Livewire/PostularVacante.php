<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Candidato;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => ['required', 'mimes:pdf'],
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }

    public function postularme()
    {
        $datos = $this->validate();

        // almacenar la imagen
        $ubicacion_cv = $this->cv->store('public/cv');
        $nombre_cv = str_replace('public/cv/', '', $ubicacion_cv);

        // crear instancia de candidato
        Candidato::create([
            'user_id' => auth()->user()->id,
            'vacante_id' => $this->vacante->id,
            'cv' => $nombre_cv
        ]);

        // enviar notificacion por email

        // crear mensaje
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte.');

        return redirect()->back();
    }
}
