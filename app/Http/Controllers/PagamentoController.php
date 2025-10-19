<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Pagamento::with(['conta', 'formaPagamento'])->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
             'conta_id' => 'required|exists:contas,id',
            'forma_pagamento_id' => 'nullable|exists:formas_pagamento,id',
            'valor' => 'required|numeric|min:0',
            'data_pagamento' => 'required|date',
            'comprovante' => 'nullable|string',
        ]);

        $pagamento = Pagamento::create($data);
        return response()->json($pagamento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pagamento $pagamento)
    {
        return response()->json(
            $pagamento->load(['conta', 'formaPagamento'])
        );
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pagamento $pagamento)
    {
        $data = $request->validate([
            'conta_id' => 'sometimes|required|exists:contas,id',
            'forma_pagamento_id' => 'sometimes|nullable|exists:formas_pagamento,id',
            'valor' => 'sometimes|required|numeric|min:0',
            'data_pagamento' => 'sometimes|required|date',
            'comprovante' => 'sometimes|nullable|string',
        ]);

        $pagamento->update($data);
        return response()->json($pagamento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();
        return response()->json(null, 204);
    }
}
