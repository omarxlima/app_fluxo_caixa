<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPagamentos = \App\Models\Pagamento::count();
        $saldoContas = \App\Models\Conta::sum('valor_pago');
        $totalPessoas = \App\Models\Pessoa::count();
        $categoriasMaisUsadas = \App\Models\Categoria::withCount('contas')
            ->orderByDesc('contas_count')
            ->take(5)
            ->get()
            ->map(function($cat) {
                return [
                    'id' => $cat->id,
                    'nome' => $cat->nome,
                    'contas_count' => $cat->contas_count,
                ];
            });

        return response()->json([
            'totalPagamentos' => $totalPagamentos,
            'saldoContas' => $saldoContas,
            'totalPessoas' => $totalPessoas,
            'categoriasMaisUsadas' => $categoriasMaisUsadas,
        ]);
    }
}
