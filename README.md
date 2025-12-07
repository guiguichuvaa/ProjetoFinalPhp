# ProjetoFinalPhp

## Sistema de Cadastro de Alunos — CRUD + Painel com Gráficos:

Este projeto é um sistema completo de gerenciamento de alunos, desenvolvido como trabalho final. Ele permite realizar operações de CRUD (Create, Read, Update, Delete), exibe uma lista detalhada de alunos, e possui um painel principal com gráficos gerados dinamicamente a partir dos dados armazenados no banco.

## 🚀 Funcionalidades:
### 🔹 Cadastro de Alunos

#### Registro de informações completas:

- Nome do aluno

- Data de nascimento

- CPF

- Curso

- Nome e tipo de responsável

- Endereço (rua, bairro, cidade, CEP, número)

### 🔹 CRUD Completo

- Cadastrar novos alunos

- Listar todos os alunos

- Editar dados já cadastrados

- Excluir alunos do sistema

### 🔹 Painel Principal

#### O painel inicial apresenta gráficos dinâmicos baseados no banco de dados, como:

- Quantidade de alunos por curso

- Bairros com mais alunos cadastrados

- Distribuição geral de cadastros

### 🔹 Banco de Dados

#### O sistema utiliza MySQL, com tabela contendo os campos:

- id_aluno

- nome_aluno

- data_nasc

- cpf

- curso

- nome_resp

- tipo_resp

- rua

- bairro

- cidade

- numero_casa

- cep

### 🛠️ Tecnologias Utilizadas

- PHP (CRUD, backend e rotinas de validação)

- MySQL (armazenamento dos dados)

- Bootstrap 5 (layout responsivo)

- JavaScript (gráficos e interação)

- Chart.js ou Google Charts (gráficos e suas informações)

## 📂 Estrutura do Projeto:
/projeto  
|-- cadastro.php  
|-- conexao.php  
|--deleta.php  
|--edita.php  
|--filtro.php  
|--footer.php  
|--formulario.php  
|--graficos.php  
|--helper.php  
|--index.php  
|--lista.php  
|--listar.php  
|--login.php  
|--logout.php  
|--menu.php  
|--painel.php  
|--telacadastro.php  
|--telaformulario.php  
|--verifica_login.php

### ▶️ Como Executar

- Clone ou baixe o repositório.

- Importe o arquivo SQL com a tabela de alunos.

- Configure o arquivo conexao.php com usuário, senha e banco.

- Inicie o servidor local (XAMPP, WAMP, Laragon etc.).

- Acesse pelo navegador:
  - http://localhost/aulas_php_guilherme/tarefasphp/boostrap/index.php

## 📊 Prints das Telas (opcional)

- Inclua aqui prints do painel, dos gráficos e das telas de CRU

## 📌 Observações Finais

Este sistema foi desenvolvido como projeto final com foco em organização, funcionalidade e visualização de dados.
Novas funcionalidades podem ser adicionadas, como autenticação de usuários ou exportação de relatórios.

