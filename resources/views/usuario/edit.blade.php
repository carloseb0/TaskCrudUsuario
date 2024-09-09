<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
@vite(['resources/js/app.js'])


<title>Task</title>

<div class="container" style="margin-top: 30px">
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
                <div>
                    <h2>Editar Usuário</h2>
                </div>
            </div>
        </div>

        @if($errors->any())
            <ul class='alert alert-danger'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>                
                @endforeach
            </ul>
        @endif

        <form action="{{ route('usuario.update', ['id' => $usuario->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row" style='display: flex; align-items: center;'> 
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $usuario->name }}" required> 
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="cpfcnpj" class="form-label">CPF</label>
                            <input type="text" id="cpfcnpj" name="cpfcnpj" class="form-control" value="{{ $usuario->cpfcnpj }}" required>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="danascimento" class="form-label">Data Nascimento</label>
                            <input type="date" id="danascimento" name="danascimento" value="{{ $usuario->danascimento }}" required>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" value="{{ $usuario->telefone }}" required>
                        </div>
                    </div>

                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="">Selecione:</option>
                                <option value="S" {{ $usuario->status == 'S' ? 'selected' : '' }}>Ativo</option>
                                <option value="N" {{ $usuario->status == 'N' ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>
                    </div>

                    <fieldset id='fieldsetEndereco'>
                        <legend class="legend-fieldset">Dados Endereço</legend>
                        <div class="row" style='display: flex; align-items: center; padding: 5px 15px;'> 
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span id="message"></span>
                                <div class="form-group">
                                    <label for="cep" class="form-label">Cep</label>
                                    <input type="text" id="cep" name="cep" class="form-control" max="8" value="{{ $usuario->cep }}" required>
                                </div>
                            </div>

                            <div class="col-xs-1 col-sm-1 col-md-1">
                                <div class="form-group">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" id="estado" name="estado" class="form-control" value="{{ $usuario->estado }}" required readonly>
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" class="form-control" value="{{ $usuario->cidade }}" required readonly>
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" class="form-control" value="{{ $usuario->bairro }}" required>
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" id="endereco" name="endereco" class="form-control" value="{{ $usuario->endereco }}" required>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="card-footer" style="text-align: right;">
                <a class="btn" id="btn-principal" href="{{ route('usuario') }}"> Voltar</a>
                <button type="submit" class="btn" id="btn-principal">Salvar</button>
            </div>
        </form>
    </div>
</div>