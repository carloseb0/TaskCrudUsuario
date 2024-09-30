## Funcionalidades do CRUD
Este sistema oferece o gerenciamento de usuários com as seguintes funcionalidades:

Cadastro, Alteração e Visualização:
```
Permite adicionar, editar e consultar usuários, com validações para CPF e Email.
```
Exclusão:
```
Ao excluir um usuário, seu status é alterado para "Inativo", mantendo o registro no banco de dados.
```
Preenchimento Automático:
```
Ao informar um CEP, a API Via CEP preenche automaticamente os campos de Endereço, Estado, Cidade e Bairro.
```
Exportação de Dados: 
```
É possível exportar a lista de usuários em formatos como PDF, XLS e CSV.
```

## Como rodar o projeto baixado
Instalar as dependências do PHP
```
composer install
```

Instalar as dependências do Node.js
```
npm install
```

Duplicar o arquivo ".env.example" e renomear para ".env"
Alterar no arquivo .env o nome da base de dados para "taskcrudusuario". Exemplo: DB_DATABASE=taskcrudusuario

Gerar a chave
```
php artisan key:generate
```

Executar as migration
```
php artisan migrate
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Executar as bibliotecas Node.js
```
npm run dev
```

Acessar o conteúdo padrão do Laravel
```
http://127.0.0.1:8000/
