# Sistema de Vendas - Laravel API

Este projeto é uma API RESTful desenvolvida com Laravel para gerenciar vendas, produtos e usuários.

## Tecnologias Utilizadas

- PHP 8.x
- Laravel 10.x
- MySQL (ou outro banco de dados relacional)
- Composer

## Funcionalidades

- Cadastro, edição, listagem e exclusão de **Produtos**
- Cadastro, edição, listagem e exclusão de **Usuários**
- Cadastro, listagem e exclusão de **Vendas**, com cálculo de valor total baseado na quantidade e no preço do produto

## Instalação

1. **Clone o repositório:**

```bash
git clone https://github.com/seu-usuario/seu-projeto.git
```

2. Acesse a pasta do projeto:

```bash
cd seu-projeto
```

3. Instale as dependências:

```bash
composer install
```

4. Configure o ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure o banco de dados no arquivo .env:

```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

6. Rode as migrations:

```bash
php artisan migrate
```

7. (Opcional) Popular com dados de exemplo (se houver seeders):

```bash
php artisan db:seed
```

8. Inicie o servidor:

```bash
php artisan serve
```

## Endpoints disponíveis

### Produtos

| Método | Endpoint             | Função                   |
| ------ | -------------------- | ------------------------ |
| GET    | `/api/produtos`      | Listar todos os produtos |
| POST   | `/api/produtos`      | Criar novo produto       |
| PUT    | `/api/produtos/{id}` | Atualizar produto        |
| DELETE | `/api/produtos/{id}` | Excluir produto          |

### Vendas

| Método | Endpoint           | Função                 |
| ------ | ------------------ | ---------------------- |
| GET    | `/api/vendas`      | Listar todas as vendas |
| POST   | `/api/vendas`      | Criar nova venda       |
| PUT    | `/api/vendas/{id}` | Atualizar venda        |
| DELETE | `/api/vendas/{id}` | Excluir venda          |

### Categorias

| Método | Endpoint               | Função                      |
| ------ | ---------------------- | --------------------------- |
| GET    | `/api/categorias`      | Listar todas as categorias  |
| POST   | `/api/categorias`      | Criar nova categorias       |
| PUT    | `/api/categorias/{id}` | Atualizar categorias        |
| DELETE | `/api/categorias/{id}` | Excluir categorias          |
