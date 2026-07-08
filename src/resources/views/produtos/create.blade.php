<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novo Produto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>


<body class="bg-light">
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Cadastro de Produto</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $erro)
                                    <li>
                                        {{ $erro }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('produtos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"> Código </label>
                            <input type="text" name="codigo" class="form-control" maxlength="30" placeholder="Código do produto" value="{{ old('codigo') }}">
                        </div>

                        <div class="mb-3"> 
                            <label class="form-label"> Nome </label> 
                            <input type="text" name="nome" class="form-control" maxlength="100" placeholder="Nome do produto" value="{{ old('nome') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Descrição </label>
                            <input type="text" name="descricao" class="form-control" maxlength="60" placeholder="Descrição do produto" value="{{ old('descricao') }}">
                        </div>

                        <div class="row"> 
                            <div class="col-md-6 mb-3"> 
                                <label class="form-label"> Valor </label>
                                <input type="text" name="valor" id="valor" class="form-control" placeholder="R$ 0,00" value="{{ old('valor') }}">
                            </div> 
                            <div class="col-md-6 mb-3"> 
                                <label class="form-label"> Quantidade </label> 
                                <input type="text" name="quantidade" id="quantidade" class="form-control" placeholder="Quantidade" value="{{ old('quantidade') }}"> 
                            </div> 
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('produtos.index') }}"class="btn btn-secondary">Voltar</a>
                            <button type="submit"class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#valor').mask('#.##0,00', {reverse: true, placeholder: '0,00'}).attr({inputmode: 'decimal', autocomplete: 'off'});

        $('#quantidade').mask('0#', {placeholder: '0'}).attr({inputmode: 'numeric', autocomplete: 'off'});
    });
</script>
</body>
</html>