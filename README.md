# Aplicação de Fluxo de Caixa

Sistema de gerenciamento de fluxo de caixa desenvolvido com Laravel, permitindo o controle de receitas e despesas, categorização de transações, gestão de contas e formas de pagamento.

## Funcionalidades

- Gestão de Pessoas/Clientes
- Categorização de Receitas e Despesas
- Controle de Contas
- Registro de Pagamentos
- Gestão de Formas de Pagamento
- Autenticação de Usuários

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
