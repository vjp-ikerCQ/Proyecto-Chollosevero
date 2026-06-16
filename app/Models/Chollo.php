<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo Chollo que extiende de Model para usar Eloquent ORM
class Chollo extends Model
{
    use HasFactory;

    /**
     * Propiedad $fillable para permitir asignación masiva (Mass Assignment).
     * Así evitamos la vulnerabilidad de Mass Assignment Exception y definimos
     * qué campos se pueden rellenar a través de los formularios.
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'url',
        'categoria',
        'puntuacion',
        'precio',
        'precio_descuento',
        'disponible',
    ];

    /**
     * El array $casts nos permite decirle a Laravel cómo debe tratar los datos
     * cuando los recuperamos de la base de datos o los guardamos.
     * Por ejemplo, 'disponible' lo trata siempre como un boolean, y los precios como decimales.
     */
    protected $casts = [
        'precio' => 'decimal:2',
        'precio_descuento' => 'decimal:2',
        'puntuacion' => 'integer',
        'disponible' => 'boolean',
    ];
}