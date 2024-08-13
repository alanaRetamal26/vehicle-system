<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Ejecuta las semillas de la base de datos.
     *
     * Aquí defino los datos que se insertarán en la tabla 'vehicles'.
     * Cada llamada a Vehicle::create() inserta una fila en la tabla.
     * Los datos de ejemplo proporcionan valores para cada campo
     * definido en el modelo `Vehicle`.
     *
     * @return void
     */
   // Dentro de VehicleSeeder.php
public function run()
{
    Vehicle::truncate(); // Elimina todos los registros de la tabla 'vehicles'

    // Luego, añade los vehículos de ejemplo
    Vehicle::create([
        'vin' => '1HGBH41JXMN109186',
        'engine_number' => '123456789',
        'displacement' => 1500,
        'year' => 2020,
        'brand' => 'Toyota',
        'model' => 'Corolla',
        'version' => 'LE',
        'plates' => ['ABC123', 'XYZ456'],
        'current_owner' => 'John Doe'
    ]);

    Vehicle::create([
        'vin' => '2HGBH41JXMN209187',
        'engine_number' => '987654321',
        'displacement' => 2000,
        'year' => 2021,
        'brand' => 'Ford',
        'model' => 'Focus',
        'version' => 'ST',
        'plates' => ['LMN456'],
        'current_owner' => 'Jane Smith'
    ]);
}

}
