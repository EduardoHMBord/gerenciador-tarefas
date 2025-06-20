# Gerenciador de Tarefas - CodeIgniter 4

Este é um sistema simples de gerenciamento de tarefas utilizando PHP, CodeIgniter 4, Bootstrap 5 e PostgreSQL.

## Funcionalidades
- Criar tarefas com título, descrição e status.
- Editar, listar e excluir tarefas.

## Como rodar o projeto

1. Clone o repositório:
   ```bash
   git clone https://github.com/EduardoHMBord/gerenciador-tarefas
   cd gerenciador-tarefas
   ```

2. Instale as dependências do CodeIgniter:
   ```bash
   composer install
   ```

3. Configure o banco de dados PostgreSQL:
   
   No terminal PostgreSQL:
   ```bash
   CREATE DATABASE gerenciador_tarefas;
   ```
   No arquivo app/Config/Database.php, localize o array default e ajuste com suas credenciais do PostgreSQL:
   ```bash
   public $default = [
    'hostname' => 'localhost',
    'username' => 'seu_usuario',
    'password' => 'sua_senha',
    'database' => 'gerenciador_tarefas',
    'DBDriver' => 'Postgre',
    'port'     => 5432,
    ...
   ];
   ```
   Acesse o banco criado:
   ```bash
   \c gerenciador_tarefas
   ```
   Crie a tabela tasks:
   ```bash
   CREATE TABLE tasks (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(20) CHECK (status IN ('pendente', 'em andamento', 'concluida')) DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. Execute o projeto:

   Renomeie o arquivo env para .env.
   
   Inicie o servidor local com o comando:
   ```bash
   php spark serve
   ```
   Acesse em: http://localhost:8080/tasks.
   
