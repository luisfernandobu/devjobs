<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
    }

    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    public function create()
    {
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    public function edit(Vacante $vacante)
    {
        // implementacion de policy
        $this->authorize('update', $vacante);

        return view('vacantes.edit', ['vacante' => $vacante]);
    }

    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }
}
