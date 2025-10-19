<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FormaPagamento::paginate());    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'ativo' => 'boolean',
        ]);

        $formaPagamento = FormaPagamento::create($data);
        return response()->json($formaPagamento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FormaPagamento $formaPagamento)
    {
        return response()->json($formaPagamento);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormaPagamento $formaPagamento)
    {
        $formaPagamento->update($request->all());
        return response()->json($formaPagamento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormaPagamento $formaPagamento)
    {
        $formaPagamento->delete();
        return response()->json(null, 204);
    }
}
