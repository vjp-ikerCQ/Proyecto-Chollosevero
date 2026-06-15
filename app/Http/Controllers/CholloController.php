<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class CholloController extends Controller
{
    /**
     * Display a listing of all chollos.
     */
    public function index()
    {
        $chollos = Chollo::orderBy('created_at', 'desc')->get();
        return view('chollos.index', compact('chollos'));
    }

    /**
     * Display the specified chollo.
     */
    public function show(Chollo $chollo)
    {
        return view('chollos.show', compact('chollo'));
    }

    /**
     * Show the form for creating a new chollo.
     */
    public function create()
    {
        return view('chollos.create');
    }

    /**
     * Store a newly created chollo in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'url' => 'required|url|max:255',
            'categoria' => 'required|string|max:255',
            'puntuacion' => 'required|integer|min:0|max:10',
            'precio' => 'required|numeric|min:0',
            'precio_descuento' => 'required|numeric|min:0',
            'disponible' => 'required|boolean',
        ]);

        Chollo::create($validated);

        return redirect()->route('chollos.index')
            ->with('success', 'Chollo creado correctamente.');
    }

    /**
     * Show the form for editing the specified chollo.
     */
    public function edit(Chollo $chollo)
    {
        return view('chollos.edit', compact('chollo'));
    }

    /**
     * Update the specified chollo in storage.
     */
    public function update(Request $request, Chollo $chollo)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'url' => 'required|url|max:255',
            'categoria' => 'required|string|max:255',
            'puntuacion' => 'required|integer|min:0|max:10',
            'precio' => 'required|numeric|min:0',
            'precio_descuento' => 'required|numeric|min:0',
            'disponible' => 'required|boolean',
        ]);

        $chollo->update($validated);

        return redirect()->route('chollos.index')
            ->with('success', 'Chollo actualizado correctamente.');
    }

    /**
     * Remove the specified chollo from storage.
     */
    public function destroy(Chollo $chollo)
    {
        $chollo->delete();

        return redirect()->route('chollos.index')
            ->with('success', 'Chollo eliminado correctamente.');
    }
}