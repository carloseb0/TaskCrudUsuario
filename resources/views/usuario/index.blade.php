
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
@vite(['resources/js/app.js'])
<title>Task</title>

<div style="padding: 10px">
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
                <div class="pull-left">
                    <h2>Usuários</h2>
                </div>
                <div class="pull-right">
                    <a class="btn" id="btn-principal" href="{{ route('usuario.exportacao') }}"><i class="fa fa-download"></i>&nbsp;Exportar</a>
                    <a class="btn" id="btn-principal" href="{{ route('usuario.create') }}">Novo Registro</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class='table talbe-stipe table-bordered table-hover table-sm'>
                <thead>
                    <tr>
                        <th>Cód.</th>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Data Nascimento</th>
                        <th>Telefone</th>
                        <th>Cep</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th width="10%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$arrUsuarios->isEmpty())
                        @foreach($arrUsuarios as $usuario)  
                            <tr>
                                <td>{{ $usuario->id}}</td>
                                <td>{{ $usuario->name}}</td>
                                <td>{{ $usuario->cpfcnpj}}</td>
                                <td>{{ Carbon\Carbon::parse($usuario->danascimento)->format('d/m/Y') }}</td>
                                <td>{{ $usuario->telefone}}</td>
                                <td>{{ $usuario->cep}}</td>
                                <td>{{ $usuario->email}}</td>
                                <td>{{ $usuario->status == 'S' ? 'Ativo' : 'Inativo'}}</td>
        
                                <td style="display: flex; justify-content: center; padding: 9px;">
                                    <a href="{{ route('usuario.edit', ['id'=>$usuario->id]) }}"  title='Editar' id="btn-tarefas" class="fa fa-edit" style="margin-right: 10px">Editar</a>
                                    <a href="{{ route('usuario.destroy', ['id'=>$usuario->id]) }}" title='Desativar' id="btn-tarefas-{{ $usuario->id }}" class="btn-desativar" style="margin-right: 10px">Desativar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                        <td colspan="5" style='text-align: center;'>Nenhum Registro Encontrado</td>
                    </tr>   
                @endif
                </tbody>
            </table>
        </div>
        {{ $arrUsuarios->links("pagination::bootstrap-4") }}
    </div>
</div>
