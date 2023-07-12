<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => ['required', 'string'],
        'salario' => ['required'],
        'categoria' => ['required'],
        'empresa' => ['required'],
        'ultimo_dia' => ['required'],
        'descripcion' => ['required'],
        'imagen' => ['required', 'image'],
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        // almacenar la imagen
        $ubicacion_imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $ubicacion_imagen);

        // crear la vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id'=> $datos['salario'],
            'categoria_id'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'ultimo_dia'=> $datos['ultimo_dia'],
            'descripcion'=> $datos['descripcion'],
            'imagen'=> $nombre_imagen,
            'user_id' => auth()->user()->id
        ]);

        // crear mensaje
        session()->flash('mensaje', 'Vacante publicada correctamente');

        // redirigir al usuario
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        // consulta salarios de BD
        $salarios = Salario::all();
        // consultar categorias
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
