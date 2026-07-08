<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">


<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                Lista de Produtos
            </h3>
            <a href="{{ route('produtos.create') }}" class="btn btn-light">
                + Novo Produto
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Cadastrado em</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td><span class="badge bg-secondary">{{ $produto->codigo }}</span></td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <a 
                                    href="{{ route('produtos.edit',$produto->id) }}"
                                    class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <form 
                                    action="{{ route('produtos.destroy',$produto->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Deseja desativar este produto?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Nenhum produto cadastrado.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

