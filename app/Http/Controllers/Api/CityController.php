<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\Api\CityService;

class CityController extends Controller
{
    private $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function create(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required',
                'state' => 'required',
                'foundation' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Você esqueceu algum campo!"
            ], 500);
        }

        $this->cityService->create($request);

        return response()->json([
            'message' => "Registro criado com sucesso"
        ], 200);
    }

    public function read(int $id)
    {

        $city = $this->cityService->read($id);

        if ($city === null){
            return response()->json([
                'message' => "Registro não encontrado"
            ], 500);
        }

        return response($city);
    }

    public function update(Request $request, int $id)
    {
        $response = $this->cityService->update( $id, $request);

        if(! $response){
            return response()->json([
                'message' => "Registro não atualizado"
            ], 500);
        }

        return response("Registro alterado com sucesso", $status = 200);
    }

    public function delete(int $id)
    {
        $response = $this->cityService->delete($id);

        if(! $response){
            return response()->json([
                'message' => "Registro não excluído"
            ], 500);
        }

        return response("Registro deletado com sucesso", $status = 200);
    }

    public function index(Request $request)
    {
        $cities = $this->cityService->index($request);

        return response($cities);
    }
}
