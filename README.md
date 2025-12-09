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
/aulas_php_guilherme  
  /tarefasphp  
    /boostrap  
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
### Index.php

<img width="1919" height="1079" alt="image" src="https://github.com/user-attachments/assets/fbe528f8-3286-41d1-9055-4b5735a8db13" />

 - Essa tela se refere à tela de login, onde o usuário insere seus dados (email e senha) para entrar na conta.

### Telacadastro.php

<img width="1919" height="1033" alt="image" src="https://github.com/user-attachments/assets/2bf16cca-e9e4-403b-828b-23293ceb66d4" />

 - Essa tela cadastra um novo usuário, isto é, a tela responsável por cadastrar uma nova conta de acesso no banco de dados, possibilitando o usuário ter acesso ao sistema. Nele, o usuário deve inserir
informações principais(nome, email e senha) para criar sua conta.

### Painel.php

<img width="1919" height="1014" alt="image" src="https://github.com/user-attachments/assets/3dab3749-3c06-4f7e-8259-d173b26d2e7c" />
<img width="1919" height="1008" alt="image" src="https://github.com/user-attachments/assets/f49e7b17-4727-4de0-aa29-cfb4ad5640c9" />

- Essa tela se refere ao painel central do programa, o qual contém informações gráficas e card explicativos com algumas informações principais referentes ao banco de dados dos alunos.

### Telaformulario.php

<img width="1919" height="1031" alt="image" src="https://github.com/user-attachments/assets/fb7eba30-d75f-48a9-9af7-33836e6bbaff" />

- Essa tela é responsável por cadastrar novos alunos. Aqui, o usuário insere informações importante, tais como nome do aluno, nome do responsável, CPF, endereço e muito mais. Após a inserção,
os dados são enviados para o banco de dados e exibidos na tela _listar.php_.

### Listar.php

<img width="1919" height="1016" alt="image" src="https://github.com/user-attachments/assets/d232dadc-df30-42ac-acf2-93187464fa73" />

- Essa tela é responsável por listar todos os alunos cadastrados no banco de dados, exibindo vossos nomes, endereços, CPF, nome dos responsáveis e muito mais. Além disso, a página conta com botões
capazes de excluir o cadastro do aluno ou editar suas informações. Ademais, possui barras de filtro que facilitam a busca por determinado aluno, seja buscando pelo nome, curso, bairro ou rua.

### Tabela users

<img width="1919" height="998" alt="image" src="https://github.com/user-attachments/assets/f0fc3623-0cce-4f55-b4cb-6c7d56e9c99d" />
- Essa é a tabela do banco _login_ responsável por armazenar os dados referentes às contas de acesso ao sistema. Ela possui os campos _nome, email e senha_.

### Tabela alunos

<img width="1918" height="1031" alt="image" src="https://github.com/user-attachments/assets/54e54218-9eb7-488d-91a2-95c9a049ddac" />

- Essa é a tabela do banco _login_ com a função de coletar e guardar os dados referentes ao cadastro dos alunos. Ela possui os _campos, id_aluno, nome_aluno, data_nasc, cpf, curso, nome_resp, tipo_resp, rua, bairro, cidade, numero_casa e cep_





## 📌 Observações Finais

Este sistema foi desenvolvido como projeto final com foco em organização, funcionalidade e visualização de dados.
Novas funcionalidades podem ser adicionadas, como autenticação de usuários ou exportação de relatórios.




