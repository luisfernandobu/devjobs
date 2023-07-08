<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacanteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('vacantes.index');
    }

    public function create()
    {
        return view('vacantes.create');
    }
}
