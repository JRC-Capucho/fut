# API de Gerenciamento de Campeonatos de Futebol

## Tecnologias Utilizadas

-   Laravel 10
-   Docker
-   PHP 8.3.0
-   Postman
-   MySQL

## Como Rodar o Projeto

Passo a passo para instalar e executar o projeto localmente.

### Pré-requisitos

Lista de softwares e ferramentas necessárias para rodar o projeto.

-   Docker
-   PHP 8.3.0 (opcional)
-   MySQL 8.3 (opcional)
-   Composer 2.6.6 (opcional)

### Execução

Como iniciar o projeto após a instalação.

```bash
git clone https://github.com/JRC-Capucho/fut.git
cd fut
docker compose up -d
```

ou

```bash
git clone https://github.com/JRC-Capucho/fut.git
cd fut
composer install
php artisan migrate
php artisan serve
```

### Estrutura da rotas

[Rotas](./ROUTES.md)
