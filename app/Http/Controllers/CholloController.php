<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class CholloController extends Controller
{
    /**
     * Muestra la página principal con el listado de todos los chollos.
     * Los obtengo ordenados por fecha de creación (los más nuevos primero).
     */
    public function index()
    {
        $chollos = Chollo::orderBy('created_at', 'desc')->get();
        // Le pasamos la variable $chollos a la vista index
        return view('chollos.index', compact('chollos'));
    }

    /**
     * Muestra la página con la información detallada de un chollo específico.
     * Utiliza inyección de dependencias (Model Binding) para buscar el chollo por ID automáticamente.
     */
    public function show(Chollo $chollo)
    {
        return view('chollos.show', compact('chollo'));
    }

    /**
     * Muestra el formulario para crear un nuevo chollo.
     */
    public function create()
    {
        return view('chollos.create');
    }

    /**
     * Guarda el chollo recién creado en la base de datos.
     * Aquí se aplican las validaciones que pide el ejercicio (Laravel Validation).
     */
    public function store(Request $request)
    {
        // Validamos que no se deje ningún campo en blanco y que los tipos sean correctos
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

        // Crea el chollo con los datos validados gracias a Eloquent
        Chollo::create($validated);

        // Redirigimos a la vista principal con un mensaje de éxito
        return redirect()->route('chollos.index')
            ->with('success', 'Chollo creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un chollo concreto pasando su id.
     */
    public function edit(Chollo $chollo)
    {
        return view('chollos.edit', compact('chollo'));
    }

    /**
     * Actualiza el chollo seleccionado en la base de datos con los nuevos datos.
     * Volvemos a usar las validaciones de Laravel.
     */
    public function update(Request $request, Chollo $chollo)
    {
        // Reglas de validación para asegurar que no nos dejen campos vacíos
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

        // Actualiza en base de datos usando Eloquent
        $chollo->update($validated);

        // Redirigimos al inicio de nuevo
        return redirect()->route('chollos.index')
            ->with('success', 'Chollo actualizado correctamente.');
    }

    /**
     * Borra el chollo seleccionado de la base de datos.
     */
    public function destroy(Chollo $chollo)
    {
        $chollo->delete(); // Uso del método delete de Eloquent

        return redirect()->route('chollos.index')
            ->with('success', 'Chollo eliminado correctamente.');
    }
}