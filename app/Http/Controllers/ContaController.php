<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Conta::with(['pessoa', 'categoria', 'pagamentos'])->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
             'pessoa_id' => 'nullable|exists:pessoas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'tipo' => 'required|in:pagar,receber',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'data_vencimento' => 'required|date',
            'status' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        $conta = Conta::create($data);
        return response()->json($conta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conta $conta)
    {
        return response()->json(
            $conta->load(['pessoa', 'categoria', 'pagamentos'])
        );
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conta $conta)
    {
        $conta->update($request->all());
        return response()->json($conta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conta $conta)
    {
        $conta->delete();
        return response()->json(null, 204);
    }
}
