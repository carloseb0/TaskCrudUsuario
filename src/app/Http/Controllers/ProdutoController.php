<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::whereNull('deleted_at')->get();

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:30',
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:200',
            'valor' => 'required',
            'quantidade' => 'required|integer|min:0'
        ]);

        Produto::create([
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'nome' => $request->nome,
            'valor' => $request->valor,
            'quantidade' => $request->quantidade
        ]);


        return redirect()
            ->route('produtos.index')
            ->with('success','Produto cadastrado');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {

        $request->validate([
            'codigo' => 'required|string|max:30',
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:200',
            'valor' => 'required',
            'quantidade' => 'required|integer|min:0'
        ]);

        $produto->update([
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'nome' => $request->nome,
            'valor' => $request->valor,
            'quantidade' => $request->quantidade
        ]);


        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produto)
    {

        $produto->update([
            'deleted_at' => now()
        ]);

        return redirect()
            ->route('produtos.index')
            ->with('success','Produto desativado');

    }
}
