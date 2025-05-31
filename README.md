# Simplifica Finanças PHP

API para gerenciamento financeiro pessoal, desenvolvida em PHP com Laravel 12, arquitetura DDD (Domain-Driven Design) e princípios de Clean Architecture.

## Visão Geral

O projeto permite o cadastro e autenticação de usuários, além do gerenciamento de contas, cartões de crédito, categorias, subcategorias e transações financeiras. Utiliza autenticação via tokens (Laravel Sanctum) e suporta múltiplos bancos de dados (SQLite, PostgreSQL, MySQL).

---

## Arquitetura

O projeto segue os princípios de **Domain-Driven Design (DDD)** e **Clean Architecture**, separando responsabilidades em camadas bem definidas:

- **Domain**: Entidades de negócio puras, sem dependências externas.
- **Application**: Casos de uso (orquestração da lógica de negócio).
- **Infrastructure**: Implementações técnicas (Eloquent Models, Repositórios, Providers).
- **Adapter**: Interfaces de entrada/saída (Controllers, DTOs, Requests).

### Estrutura de Pastas

```
app/
  Finance/
    Domain/Entities/         # Entidades do domínio financeiro
    Infrastructure/          # Models Eloquent e repositórios financeiros
    Adapter/                 # DTOs e interfaces HTTP para finanças
  User/
    Domain/Entities/         # Entidade User
    Application/UseCases/    # Casos de uso de usuário
    Infrastructure/          # Models, repositórios e providers de usuário
    Adapter/                 # Controllers, DTOs e Requests de usuário
bootstrap/                   # Inicialização do Laravel
config/                      # Configurações do Laravel e integrações
database/                    # Migrations, seeders e factories
routes/                      # Rotas da API e comandos
tests/                       # Testes unitários e de funcionalidade
```

### Exemplo de Fluxo (Cadastro de Usuário)

1. **Request**: [`CreateUserRequest`](app/User/Adapter/Http/Requests/CreateUserRequest.php) recebe e valida os dados.
2. **DTO**: Dados são convertidos para [`CreateUserDTO`](app/User/Adapter/Http/DTOs/CreateUserDTO.php).
3. **Controller**: [`UserController`](app/User/Adapter/Http/Controller/UserController.php) chama o caso de uso.
4. **UseCase**: [`CreateUserUseCase`](app/User/Application/UseCases/CreateUserUseCase.php) orquestra a criação.
5. **Domain**: [`User`](app/User/Domain/Entities/User.php) representa a entidade de domínio.
6. **Repository**: [`UserRepository`](app/User/Infrastructure/Persistence/Repository/UserRepository.php) salva no banco via [`UserModel`](app/User/Infrastructure/Persistence/Models/UserModel.php).

---

## Funcionalidades

- Cadastro, login e atualização de usuário ([rotas](routes/api.php))
- Gerenciamento de contas bancárias, cartões, categorias, subcategorias e transações (em desenvolvimento)
- Autenticação via Laravel Sanctum
- Suporte a filas, cache, sessões e múltiplos bancos de dados
- Testes automatizados ([tests/](tests/))

---

## Instalação

```sh
git clone https://github.com/seu-usuario/simplifica-financas-php.git
cd simplifica-financas-php
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Para rodar com PostgreSQL via Docker:
```sh
docker-compose up -d
```

---

## Testes

```sh
php artisan test
```

---

## Principais Rotas

- `POST /api/user/register` — Cadastro de usuário
- `POST /api/user/login` — Login (retorna token)
- `PUT /api/user/update` — Atualização de dados (autenticado)

Veja todas as rotas em [routes/api.php](routes/api.php).

---

## Tecnologias

- PHP 8.2+
- Laravel 12.x
- Laravel Sanctum
- Docker (opcional)
- PHPUnit
