<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\NeighbourhoodService;
use Illuminate\Http\Request;

class NeighbourhoodController extends Controller
{
    private $neighbourhoodService;

    public function __construct(NeighbourhoodService $neighbourhoodService)
    {
        $this->neighbourhoodService = $neighbourhoodService;
    }

    public function create(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required',
                'city_id' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Você esqueceu algum campo!"
            ], 500);
        }

        $this->neighbourhoodService->create($request);

        return response()->json([
            'message' => "Registro criado com sucesso"
        ], 200);
    }

    public function read(int $id)
    {

        $neighbourhood = $this->neighbourhoodService->read($id);

        if ($neighbourhood === null){
            return response()->json([
                'message' => "Registro não encontrado"
            ], 500);
        }

        return response($neighbourhood);
    }

    public function update(Request $request, int $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'city_id' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Você esqueceu algum campo!"
            ], 500);
        }
        
        $response = $this->neighbourhoodService->update( $id, $request);

        if(! $response){
            return response()->json([
                'message' => "Registro não atualizado"
            ], 500);
        }

        return response("Registro alterado com sucesso", $status = 200);
    }

    public function delete(int $id)
    {
        $response = $this->neighbourhoodService->delete($id);

        if(! $response){
            return response()->json([
                'message' => "Registro não excluído"
            ], 500);
        }

        return response("Registro deletado com sucesso", $status = 200);
    }

    public function index(Request $request)
    {
        $cities = $this->neighbourhoodService->index($request);

        return response($cities);
    }
}
