# 🎬 CineFlow

Sistema web simples para gerenciamento de cinema, com funcionalidades de cadastro de filmes, login de usuários, sessões, compra de ingressos e seleção de cadeiras.

## 🚀 Tecnologias Utilizadas

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Banco de Dados**: MySQL
- **Ambiente de Desenvolvimento**: XAMPP

## 📋 Funcionalidades

- Tela inicial com lista de filmes em cartaz
- Login de usuário
- Cadastro de filmes (admin)
- Compra de ingressos
- Escolha de cadeiras disponíveis
- Barra de pesquisa de filmes

## 🧩 Estrutura do Banco de Dados

- **usuario**: id, nome, senha, tipo
- **filmes**: id, título, descrição, duração, valor ingresso
- **sessao**: id, id_filme, data e hora, sala
- **cadeira**: id, número, id_sessao, ocupado
- **compra**: id, id_usuario, id_sessao, data_compra, valor_total
- **cadeira_reservada**: id, id_compra, id_cadeira

## 🔐 Tipos de Usuário

- **Admin**: pode cadastrar, editar e remover filmes
- **Cliente**: pode visualizar filmes, comprar ingressos e escolher cadeiras

## 📦 Como Executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/CineFlow.git
