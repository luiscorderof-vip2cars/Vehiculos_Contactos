<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class VehicleController extends Controller
{
    // List + pagination + search
    public function index(Request $request)
    {
        $perPage = (int) $request->get('per_page', 10);
        $search = $request->get('search');

        $query = Vehicle::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('placa','like',"%{$search}%")
                  ->orWhere('marca','like',"%{$search}%")
                  ->orWhere('modelo','like',"%{$search}%")
                  ->orWhere('cliente_nombre','like',"%{$search}%")
                  ->orWhere('cliente_apellidos','like',"%{$search}%")
                  ->orWhere('cliente_documento','like',"%{$search}%");
            });
        }

        $vehicles = $query->orderBy('created_at','desc')->paginate($perPage);

        return VehicleResource::collection($vehicles)
            ->additional(['meta' => [
                'total' => $vehicles->total(),
                'per_page' => $vehicles->perPage(),
                'current_page' => $vehicles->currentPage(),
                'last_page' => $vehicles->lastPage(),
            ]]);
    }

    public function store(StoreVehicleRequest $request)
    {
        DB::beginTransaction();
        try {
            $vehicle = Vehicle::create($request->validated());
            DB::commit();
            return (new VehicleResource($vehicle))->response()->setStatusCode(201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error creando vehículo.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        DB::beginTransaction();
        try {
            $vehicle->update($request->validated());
            DB::commit();
            return new VehicleResource($vehicle);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error actualizando vehículo.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Vehicle $vehicle)
    {
        try {
            $vehicle->delete();
            return response()->json(['message' => 'Vehículo eliminado correctamente.'], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error eliminando vehículo.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
