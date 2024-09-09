<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuarioRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class usuarioController extends Controller
{
    public function index()
    {
        $arrUsuarios = User::where('id', "!=", 0)->orderBy('id')->paginate(15);

        return view('usuario.index', [
            'arrUsuarios' => $arrUsuarios
        ]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(usuarioRequest $request)
    {
        try {
            User::create($request->all());
            
            return redirect('usuario')->with('mensagem', 'Usuário cadastrado com sucesso!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                Log::error($e->getMessage());
    
                return redirect()->back()->with('error', 'Erro: O CPF informado já está cadastrado.');
            }

            throw $e;
        }
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->status = 'N';
        $usuario->save();

        return redirect()->route('usuario')->with('success', 'Status do usuário atualizado com sucesso.');
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(usuarioRequest $request, $id)
    {
        $usuario = User::find($id);
        $usuario->update($request->all());

        return redirect()->route('usuario');
    }

    public function exportacao() 
    {
        $arrUsuarios = User::all();

        $csvNomeArquivo = tempnam(sys_get_temp_dir(), 'csv_' . Str::ulid());
        $arquivoAberto = fopen($csvNomeArquivo, 'w');
    
        $cabecalho = ['id', 'name', 'cpfcnpj', 'danascimento', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'endereco', 'email', 'status'];
        fputcsv($arquivoAberto, $cabecalho, ';');

        foreach($arrUsuarios as $user){
            $date = Carbon::parse($user->danascimento);

            $arrUsers = [
                'id' => $user->id,
                'name' => mb_convert_encoding($user->name, 'ISO-8859-1', 'UTF-8'),
                'cpfcnpj' => $user->cpfcnpj,
                'danascimento' => $date->format('d/m/Y'),
                'telefone' => $user->telefone,
                'cep' => $user->cep,
                'estado' => $user->estado,
                'cidade' => mb_convert_encoding($user->cidade, 'ISO-8859-1', 'UTF-8'),
                'bairro' => mb_convert_encoding($user->bairro, 'ISO-8859-1', 'UTF-8'),
                'endereco' => $user->endereco,
                'email' => $user->email,
                'status' => $user->status == 'S' ? 'Ativo' : 'Inativo',
            ];

            fputcsv($arquivoAberto, $arrUsers, ';');
        }

        fclose($arquivoAberto);
        return response()->download($csvNomeArquivo, 'relatorio_users' . Str::ulid() . '.csv');
    }
}