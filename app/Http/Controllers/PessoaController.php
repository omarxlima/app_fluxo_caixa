<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Pessoa::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
             'nome' => 'required|string|max:255',
            'tipo' => 'required|in:cliente,fornecedor',
            'documento' => 'nullable|string',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
        ]);

        $pessoa = Pessoa::create($data);
        return response()->json($pessoa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pessoa $pessoa)
    {
        return response()->json($pessoa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());
        return response()->json($pessoa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return response()->json(null, 204);
    }
}
