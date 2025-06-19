# <p align="center">🚀 Dinamk</p>

> Este projeto é uma aplicação web simples desenvolvida com Laravel, focando em boas práticas de desenvolvimento, segurança e organização de código. Ele foi criado como parte do processo seletivo da **Dinamk Tech**.

### As principais funcionalidades incluem

- Cadastro e autenticação de novos usuários;
- Gerenciamento completo de usuários, permitindo que usuários autenticados possam cadastrar, editar, deletar e gerenciar outros usuários no sistema.

📄 [Acesse o PDF do desafio](https://github.com/Xylusca/dinamk/blob/main/DinamkTeste.pdf)
--

## 📦 Requisitos

- PHP 8.1 ou superior
- Composer
- MySQL
- Mailpit (ou similar para testes de e-mail)

## ⚙️ Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/Xylusca/dinamk.git
cd dinamk
```

### 2. Instale as dependências do projeto

```bash
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Abra o projeto no VS Code (opcional):

```bash
code .
```

Edite o arquivo **.env** com as suas configurações locais:

### 4. Execute as migrações do banco de dados

```bash
php artisan migrate
```

### 5. Crie o link simbólico para arquivos públicos

```bash
php artisan storage:link
```

## 🚀 Executando o Projeto

### 1. Inicie o servidor de desenvolvimento

```bash
php artisan serve
```

### 2. Inicie o processamento de filas

```bash
php artisan queue:restart
php artisan queue:work
```
