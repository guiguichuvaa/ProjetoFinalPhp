<?php 

include 'lista.php';
include 'helper.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Alunos</title>
        	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body class="bg-light">
    <section class="h-100">
        <?php include 'menu.php';?>
        
    <header>
        <h1>Lista dos Alunos Cadastrados:</h1>

         <!--Mensagem de cadastro inicio-->
							<?php 
								if(isset($_SESSION['busca'])):
							?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $_SESSION['busca']; ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							<?php 
								unset($_SESSION['busca']); //limpa a msg após exibir
								endif;
							?>
							<!--Mensagem de cadastro final-->

    <form action="filtro.php" method="POST" >
        <div class="row g-1">
    <div class="col-3">
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control" id="nome" placeholder="Nome do aluno" name="nome">
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="nome">Curso: </label>
            <input type="text" class="form-control" id="curso" placeholder="Curso do aluno" name="curso">
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="nome">Bairro: </label>
            <input type="text" class="form-control" id="bairro" placeholder="Bairro do aluno" name="bairro">
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="nome">Rua: </label>
            <input type="text" class="form-control" id="rua" placeholder="Rua do aluno" name="rua">
        </div>
    </div>
      
    </div>
 
    <button type="submit" class="btn btn-primary mb-3 mt-3 w-100" >Buscar</button><br>
    <button type="submit" class="btn btn-danger w-100"> Limpar Filtro</button>       
</form>
</div>
    </header>

    <div class="row justify-content-sm-center h-100 g-2">
    <table class="table table-striped-columns" border="1">
        <tr scope="col">
            <th scope="row">Nome do Aluno</th>
            <th scope="row">Data de Nascimento</th>
            <th scope="row">CPF</th>
            <th scope="row">Curso</th>
            <th scope="row">Nome do Responsável</th>
            <th scope="row">Parentalidade</th>
            <th scope="row">Rua</th>
            <th scope="row">Bairro</th>
            <th scope="row">Cidade</th>
            <th scope="row">CEP</th>
            <th scope="row">Número da Casa</th>
            <th scope="row">Opções</th>
        </tr>
        <?php foreach ($lista_alunos as $alunos) : ?>
            <tr scope="col">
                <td><?php echo $alunos['nome_aluno']; ?></td>
                <td><?php echo traduz_data_exibir($alunos['data_nasc']); ?></td>
                <td><?php echo $alunos['cpf']; ?></td>
                <td><?php echo $alunos['curso']; ?></td>
                <td><?php echo $alunos['nome_resp']; ?></td>
                <td><?php echo $alunos['tipo_resp']; ?></td>
                <td><?php echo $alunos['rua']; ?></td>
                <td><?php echo $alunos['bairro']; ?></td>
                <td><?php echo $alunos['cidade']; ?></td>
                <td><?php echo $alunos['cep']; ?></td>
                <td><?php echo $alunos['numero_casa']; ?></td>
                <td>
                    <a type="button" class="btn btn-primary mb-3 " href="edita.php?id_aluno=<?php echo $alunos['id_aluno']; ?>">
                      Editar
        </a>
                    <a  type="button" class="btn btn-danger " href="deleta.php?id_aluno=<?php echo $alunos['id_aluno']; ?>">
                      Deletar
        </a>
                </td>
            </tr>
        <?php endforeach; ?>
        
    </table>

    </div>
        	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</section>
</body>
</html>
