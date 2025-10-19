
# Aplicação de Fluxo de Caixa

Sistema de gerenciamento de fluxo de caixa, permitindo o controle de receitas e despesas, categorização de transações, gestão de contas e formas de pagamento.

## Funcionalidades

- Gestão de Pessoas/Clientes
- Categorização de Receitas e Despesas
- Controle de Contas
- Registro de Pagamentos
- Gestão de Formas de Pagamento
- Autenticação de Usuários
## Observações Importantes

Funcionalidades pendentes na API:
- Testes unitários
- Filtros nas rotas/endpoints
- Perfis de usuário (controle de acesso)

## Requisitos

- PHP 8.1 ou superior
- Composer
- Docker (opcional, para usar com Laravel Sail)

## Instalação

### Usando Composer

1. Clone o repositório:

```bash
git clone [url-do-repositorio]
cd app_fluxo_caixa
```

1. Instale as dependências:

```bash
composer install
```

1. Configure o arquivo de ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

1. Configure seu banco de dados no arquivo `.env`

1. Execute as migrações:

```bash
php artisan migrate
```

1. (Opcional) Execute os seeders para dados de exemplo:

```bash
php artisan db:seed
```

### Usando Docker com Laravel Sail

1. Clone o repositório:

```bash
git clone [url-do-repositorio]
cd app_fluxo_caixa
```

1. Instale o Laravel Sail:

```bash
composer require laravel/sail --dev
php artisan sail:install
```

1. Configure o arquivo de ambiente:

```bash
cp .env.example .env
```

1. Inicie os containers do Docker:

```bash
./vendor/bin/sail up -d
```

1. Gere a chave da aplicação:

```bash
./vendor/bin/sail artisan key:generate
```

1. Execute as migrações:

```bash
./vendor/bin/sail artisan migrate
```

1. (Opcional) Execute os seeders:

```bash
./vendor/bin/sail artisan db:seed
```

## Autenticação e Acesso

A API utiliza autenticação via token (Laravel Sanctum). Para acessar as rotas protegidas, você precisa:

1. Fazer login para obter o token de acesso:

```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@maxtech.com",
    "password": "adminadmin"
  }'
```

1. Usar o token recebido nas requisições subsequentes:

```bash
curl -X GET http://localhost:8000/api/user \
  -H "Authorization: Bearer seu-token-aqui" \
  -H "Accept: application/json"
```

### Credenciais Padrão

Após executar os seeders, você terá acesso com:

- **Email**: admin@maxtech.com
- **Senha**: adminadmin

### Endpoints de Autenticação

- `POST /api/register` - Registrar novo usuário
- `POST /api/login` - Fazer login e obter token
- `POST /api/logout` - Fazer logout (invalidar token)
- `GET /api/user` - Obter dados do usuário autenticado

### Rotas Protegidas

Todas as rotas abaixo requerem autenticação (header Authorization com Bearer token):

- `/api/pessoas` - Gestão de pessoas
- `/api/categorias` - Gestão de categorias
- `/api/formas-pagamento` - Gestão de formas de pagamento
- `/api/contas` - Gestão de contas
- `/api/pagamentos` - Gestão de pagamentos

## Estrutura do Banco de Dados

- `users`: Usuários do sistema
- `pessoas`: Cadastro de pessoas/clientes
- `categorias`: Categorias de receitas e despesas
- `formas_pagamento`: Formas de pagamento disponíveis
- `contas`: Contas financeiras
- `pagamentos`: Registro de transações

## Comandos Úteis

### Composer

```bash
# Instalar dependências
composer install

# Atualizar dependências
composer update
```

### Artisan (Laravel)

```bash
# Criar migration
php artisan make:migration create_nome_tabela

# Executar migrations
php artisan migrate

# Reverter migrations
php artisan migrate:rollback

# Criar controller
php artisan make:controller NomeController

# Criar model
php artisan make:model Nome
```

### Laravel Sail

```bash
# Iniciar containers
./vendor/bin/sail up -d

# Parar containers
./vendor/bin/sail down

# Executar comandos artisan
./vendor/bin/sail artisan [comando]

# Executar comandos composer
./vendor/bin/sail composer [comando]

# Acessar terminal do container
./vendor/bin/sail shell
```

## Testes

Execute os testes usando o PEST:

```bash
./vendor/bin/sail test
```

ou sem Docker:

```bash
php artisan test
```

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
