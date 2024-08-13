<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecute la migración para crear la tabla de vehículos.
     *
     * En este método, configuro la estructura de la tabla `vehicles` en la base de datos.
     * Incluyo columnas para todos los datos relevantes del vehículo, y me aseguro de que cada columna tenga el tipo de dato adecuado.
     * También defino las restricciones necesarias, como que el VIN sea único.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            // Creo una columna de tipo ID autoincremental
            $table->id();

            // Defino la columna 'vin' para almacenar el número de identificación del vehículo, asegurándome de que sea único
            $table->string('vin')->unique();

            // Creo la columna 'engine_number' para el número de motor del vehículo
            $table->string('engine_number');

            // Defino la columna 'displacement' para la cilindrada del motor
            $table->integer('displacement');

            // Defino la columna 'year' para el año del vehículo
            $table->integer('year');

            // Creo la columna 'brand' para la marca del vehículo
            $table->string('brand');

            // Creo la columna 'model' para el modelo del vehículo
            $table->string('model');

            // Creo la columna 'version' para la versión del vehículo
            $table->string('version');

            // Defino la columna 'plates' como un campo JSON que puede ser nulo, para almacenar las placas del vehículo
            $table->json('plates')->nullable();

            // Defino la columna 'current_owner' como una cadena opcional para el propietario actual del vehículo
            $table->string('current_owner')->nullable();

            // Agrego las columnas 'created_at' y 'updated_at' para el seguimiento de las fechas de creación y actualización
            $table->timestamps();
        });
    }

    /**
     * Revierto la migración eliminando la tabla de vehículos.
     *
     * Este método se utiliza para deshacer la migración en caso de que necesite eliminar la tabla `vehicles`.
     * El método `dropIfExists` asegura que solo se eliminará la tabla si existe.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
