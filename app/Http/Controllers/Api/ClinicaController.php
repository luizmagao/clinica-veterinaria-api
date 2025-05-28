<?php

namespace App\Http\Controllers\Api;

use App\Models\Clinica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClinicaRequest;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clinicas = Clinica::get();
            return response()->json([
                'messagem' => $clinicas,
                'sucesso' => true
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'messagem' => 'Não foi possível carregar as clínicas.',
                'error' => $th->getMessage(),
                'sucesso' => false
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClinicaRequest $request)
    {
        try {
            $clinica = Clinica::create($request->all());
            return response()->json([
                    'mesagem' => 'Clínica cadastrada com sucesso!',
                    'sucesso' => true
                ], 201);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'messagem' => 'Não foi possível cadastrar a clínica.',
                'error' => $th->getMessage(),
                'sucesso' => false
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $clinica = Clinica::findOrFail($id);
            return response()->json([
                    'mesagem' => $clinica,
                    'sucesso' => true
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'messagem' => 'Não foi possível apresentar a clínica.',
                'error' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clinica $clinica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clinica $clinica)
    {
        //
    }
}
