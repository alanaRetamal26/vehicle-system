<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Aquí llamo a los seeders específicos que quiero ejecutar.
     * Esto asegura que los datos de ejemplo se inserten en la base de datos
     * cuando ejecute el comando `php artisan db:seed`.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VehicleSeeder::class);
    }
}
