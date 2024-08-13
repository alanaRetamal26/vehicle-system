<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden llenar de forma masiva.
     *
     * Aquí defino qué atributos del modelo `Vehicle` pueden ser asignados de forma masiva.
     * Esto significa que estos campos son los que se pueden proporcionar al crear o actualizar un vehículo,
     * garantizando que solo estos campos específicos se pueden llenar.
     *
     * @var array
     */
    protected $fillable = [
        'vin',               // Número de identificación del vehículo (VIN)
        'engine_number',     // Número de motor del vehículo
        'displacement',      // Cilindrada del motor
        'year',              // Año del vehículo
        'brand',             // Marca del vehículo
        'model',             // Modelo del vehículo
        'version',           // Versión del vehículo
        'plates',            // Placas del vehículo, almacenadas como un array
        'current_owner'      // Propietario actual del vehículo
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * En este caso, indico que el atributo 'plates' debería ser tratado como un array.
     * Esto permite que Laravel maneje automáticamente la conversión entre el formato JSON almacenado
     * en la base de datos y el formato de array en PHP cuando interactúas con este atributo.
     *
     * @var array
     */
    protected $casts = [
        'plates' => 'array', // Convertir 'plates' a un array cuando se accede a él
    ];

}
