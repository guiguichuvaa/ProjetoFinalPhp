<?php 
session_start();
include 'conexao.php';

if(isset($_POST['name']) && $_POST['name'] != ''){
    $alunos = array();

    

    $alunos['id_aluno'] = $_GET['id_aluno'];

    $alunos['name'] = $_POST['name'];


if(isset($_POST['data_nasc']) && $_POST['data_nasc'] != ''){

    $alunos['data_nasc'] = $_POST['data_nasc'];
}else{
    $alunos['data_nasc'] = "0000-00-00";
}

if(isset($_POST['cpf']) && $_POST['cpf'] != ''){

    $alunos['cpf'] = $_POST['cpf'];
}

if(isset($_POST['rua']) && $_POST['rua'] != ''){

    $alunos['rua'] = $_POST['rua'];
}

if(isset($_POST['cep']) && $_POST['cep'] != ''){

    $alunos['cep'] = $_POST['cep'];
}

if(isset($_POST['cidade']) && $_POST['cidade'] != ''){

    $alunos['cidade'] = $_POST['cidade'];
}

if(isset($_POST['bairro']) && $_POST['bairro'] != ''){

    $alunos['bairro'] = $_POST['bairro'];
}

if(isset($_POST['number']) && $_POST['number'] != ''){

    $alunos['number'] = $_POST['number'];
}

if(isset($_POST['name_resp']) && $_POST['name_resp'] != ''){

    $alunos['name_resp'] = $_POST['name_resp'];
}

if(isset($_POST['tipo_resp']) && $_POST['tipo_resp'] != ''){

    $alunos['tipo_resp'] = $_POST['tipo_resp'];
}

if(isset($_POST['curso']) && $_POST['curso'] != ''){

    $alunos['curso'] = $_POST['curso'];
}

//formatação de variáveis:
        $_POST['cpf'] = preg_replace('/\D/', '', $_POST['cpf']);
        if(strlen($_POST['cpf']) != 11 || !is_numeric($_POST['cpf'])){
            $_SESSION['mensagem'] = "O CPF precisa ser numérico e com 11 dígitos.";
            header('Location: telaformulario.php');
            exit();
        }

        if(is_numeric($_POST['name']) || is_numeric($_POST['name'])){
            $_SESSION['mensagem'] = "Os campos Nome Completo e Nome do Responsável não podem conter números.";
            header('Location: telaformulario.php');
            exit();
        }

        if(!is_numeric($_POST['cep']) || !is_numeric($_POST['numero_casa'])){
            $_SESSION['mensagem'] = "Os campos CEP e Número só devem conter números.";
            header('Location: telaformulario.php');
            exit();
        }

        if(strlen($_POST['cep']) != 8){
            $_SESSION['mensagem'] = "O campo CEP deve conter 8 dígitos.";
            header('Location: telaformulario.php');
            exit();
        }

 

edita_aluno($conexao, $alunos);
}

$alunos = busca_aluno($conexao, $_GET['id_aluno']);

function busca_aluno($conexao, $id){
    $sql_busca = "SELECT * FROM alunos where id_aluno = ". $id;
    $result = mysqli_query($conexao, $sql_busca);
    return mysqli_fetch_assoc($result);
}

function edita_aluno($conexao, $alunos){
    $sql_edita = "UPDATE alunos SET nome_aluno = '{$alunos['name']}', data_nasc = '{$alunos['data_nasc']}',
    cpf = '{$alunos['cpf']}', curso = '{$alunos['curso']}', nome_resp = '{$alunos['name_resp']}', tipo_resp = '{$alunos['tipo_resp']}',
    rua = '{$alunos['rua']}', bairro = '{$alunos['bairro']}', cidade = '{$alunos['cidade']}', numero_casa = '{$alunos['number']}',
    cep = '{$alunos['cep']}' WHERE id_aluno = '{$alunos['id_aluno']}'";
    mysqli_query($conexao, $sql_edita);
    header('Location: listar.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new element</title>
    
</head>
<body class="bg-light">
    <section class="h-100">
        <?php 
include('menu.php');
?>
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                        <div class="card-body p-3">
                            <h1 class="fs-4 card-tittle fw-bold mb-1">Update Element</h1>
                        
                        <form action="" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                          
                        <!--Mensagem de cadastro inicio-->
							<?php 
								if(isset($_SESSION['busca'])):
							?>
							<div class="alert alert-info alert-dismissible fade show" role="alert">
								<?= $_SESSION['busca']; ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							<?php 
								unset($_SESSION['busca']); //limpa a msg após exibir
								endif;
							?>
							<!--Mensagem de cadastro final-->
                        <div class="mb-3">
                            <label for="nome" class="mb-2 text-muted">Nome Completo</label>
                            <input type="name" id="name" class="form-control " name="name" value="<?php echo $alunos['nome_aluno']?>" required autofocus>
                            </div>

                            <div class="mb-3">
                                <div class="row g-2">
                                <div class="col-6">
                                    <label for="date" class="mb-2 text-muted">Data Nascimento:</label>
                                    <input type="date" id="date" class="form-control" name="data_nasc" value="<?php echo $alunos['data_nasc']?>" required autofocus>
                                </div>
                                <div class="col-6 ">
                                    <label for="text" class="mb-2 text-muted">CPF:</label>
                                    <input type="text" id="text" class="form-control" name="cpf" value="<?php echo $alunos['cpf']?>" required autofocus>
                                </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="mb-2 text-muted">Rua:</label>
                                <input type="address" id="address" class="form-control" name="rua" value="<?php echo $alunos['rua']?>" required autofocus>
                            </div>
                                <div class="mb-3">
                                <label for="address" class="mb-2 text-muted">CEP:</label>
                                <input type="address" id="address" class="form-control" name="cep" value="<?php echo $alunos['cep']?>" required autofocus>
                            </div>

                            <div class="mb-3">
                                <div class="row g-1">
                                <div class="col-4">
                                <label for="address" class="mb-2 text-muted">Cidade:</label>
                                <input type="address" id="address" class="form-control" name="cidade" value="<?php echo $alunos['cidade']?>" required autofocus>
                            
                                </div>
                                <div class="col-4">
                                <label for="address" class="mb-2 text-muted">Bairro:</label>
                                <input type="address" id="address" class="form-control" name="bairro" value="<?php echo $alunos['bairro']?>" required autofocus>
                                </div>

                                <div class="col-4">
                                <label for="number" class="mb-2 text-muted">Número:</label>
                                <input type="text" id="number" class="form-control" name="number" value="<?php echo $alunos['numero_casa']?>" required autofocus>
                                </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row g-1">
                                <div class="col-8">
                                <label for="nome" class="mb-2 text-muted">Nome Responsável:</label>
                            <input type="text" id="name" class="form-control " name="name_resp" value="<?php echo $alunos['nome_resp']?>" required autofocus>
                            </div>

                            <div class="col-4">
                                <label for="type" class="mb-2 text-muted">Tipo:</label>
                                <select class="form-select" aria-label="Default select example" name="tipo_resp" value="<?php echo $alunos['tipo_resp']?>">
                                <option value="Pai">Pai</option>
                                <option value="Mãe">Mãe</option>
                                <option value="Avó">Avó</option>
                                <option value="Avô">Avô</option>
                                <option value="Outro">Outro</option>
                                </select>
                                
                            </div>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label for="couse" class="mb-2 text-muted">Curso:</label>
                                <select class="form-select" aria-label="Default select example" name="curso" value="<?php echo $alunos['curso']?>">
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                Atualizar
                            </button>
                            </div>
                            </div>


                        </form>
                        </div>
                    </div>
                </div>

            </div>



    </section>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
