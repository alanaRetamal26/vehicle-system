<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    /**
     * Buscar un vehículo por VIN o placa.
     *
     * En este método, recibo una consulta desde el cliente con el VIN o la placa del vehículo que queremos buscar.
     * Valido que el parámetro esté presente y sea una cadena, luego busco el vehículo en la base de datos.
     * Si encuentro el vehículo, lo devuelvo en formato JSON. Si no, regreso un mensaje de error.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Valido que el parámetro 'query' sea obligatorio y sea una cadena
        $request->validate([
            'query' => 'required|string',
        ], [
            'query.required' => 'El campo de búsqueda es obligatorio.',
        ]);


        // Busco el vehículo por VIN o por placa
        $vehicle = Vehicle::where('vin', $query)
            ->orWhereJsonContains('plates', $query)
            ->first();

        if ($vehicle) {
            return response()->json($vehicle);
        }

        return response()->json(['message' => 'Vehículo no encontrado'], 404);
    }

    /**
     * Almaceno un nuevo vehículo.
     *
     * Aquí recibo los datos de un nuevo vehículo y los valido antes de almacenarlos en la base de datos.
     * Si todo está bien, creo el vehículo y devuelvo su información con un código de estado 201.
     * Si algo sale mal, registro el error y regreso un mensaje de error con un código de estado 500.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Valido los datos recibidos
        $validated = $request->validate([
            'vin' => 'required|string|max:17',
            'engine_number' => 'required|string|max:50',
            'displacement' => 'required|integer',
            'year' => 'required|integer',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'version' => 'required|string|max:50',
            'plates' => 'required|string|max:255', // Acepto las placas como una cadena
            'current_owner' => 'required|string|max:100',
        ]);

        // Convierto la cadena de placas en un array
        $validated['plates'] = explode(',', $validated['plates']);

        try {
            // Creo el vehículo y lo guardo en la base de datos
            $vehicle = Vehicle::create($validated);
            return response()->json($vehicle, 201);
        } catch (\Exception $e) {
            // Registro el error y devuelvo un mensaje de error
            Log::error('Error al crear el vehículo:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error al crear el vehículo'], 500);
        }
    }

    /**
     * Obtengo todos los vehículos.
     *
     * En este método, recupero todos los vehículos que tengo almacenados en la base de datos y los devuelvo en formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return response()->json($vehicles);
    }
}
